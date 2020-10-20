var express = require('express');
var router = express.Router();
var models = require('./../models/index');
var redisJson = require('redis-store-json')
var redis = require('redis');

let clientRedis = redis.createClient({
  host: '127.0.0.1',
  port: 6379,
  db: 0
});

redisJson.use(clientRedis);

router.use(async function (req, res, next) {
  if (req.method !== "OPTIONS") {
    if (!req.headers.authorization) {
      return res.status(403).json({ error: 'No credentials sent!' });
    }


    await clientRedis.get(req.headers.authorization, function (err, data) {
      let datas = JSON.parse(data);
      if (data == null) {
        return res.status(403).json({ error: 'No credentials sent!' });
      }
      // req.headers.id = datas.id;
      // req.headers.email = datas.email;
    });
  }
  next();
});

/**
 * chat list
 */
router.get('/', async function (req, res, next) {
  try {
    const groups = await models.Groups.findAll({
      attributes: [['id', 'group_id'], 'group_name'],
      include: [
        {
          model: models.Members,
          as: 'created',
          attributes: ['name', 'email', ['photo','profile']]
        },
        {
          model: models.Chats,
          as: 'messages',
          attributes: ['message'],
          include: [
            {
              model: models.Members,
              as: 'created',
              attributes: ['name', 'email', ['photo','profile']]
            }
          ]
        },
        {
          model: models.GroupHasMember,
          as: 'group_member',
          attributes: ['member_id']
        },
      ]
    });

    let data = {};
    data.groups = groups;
    res.json({ data: data });
  }
  catch (err) {
    console.log(err);
    res.json({
      'status': 'ERROR',
      'messages': err.messages,
      'data': {}
    })
  }

});

router.post('/chat-message/:group', async function (req, res, next) {
  try {
    const newChat = await models.Chats.create({ group_id: req.params.group, created_by: req.headers.id, message: req.body.message });
    if (newChat) {
      res.json({ message: 'success', 'status_code': 200 });
    }
  }
  catch (err) {
    res.json({
      'status': 'ERROR',
      'messages': err.messages,
      'data': {},
      'status_code': 400
    })
  }
});

router.get('/chat-message/:group_id', async function (req, res, next) {
  try {
    const groups = await models.Groups.findOne({
      where: { id: req.params.group_id },
      attributes: [['id', 'group_id'], 'group_name'],
      include: [
        {
          model: models.Members,
          as: 'created',
          attributes: ['name', 'email', ['photo','profile']]
        },
        {
          model: models.Chats,
          as: 'messages',
          attributes: ['id', 'message', 'created_at'],
          order: [
            ['id', 'DESC']
          ],
          include: [
            {
              model: models.Members,
              as: 'created',
              attributes: ['name', 'email', ['photo','profile']]
            }
          ]
        },
        {
          model: models.GroupHasMember,
          as: 'group_member',
          attributes: ['group_id','member_id'],
          include:[
            {
              model: models.Members,
              as: 'group_contact',
              attributes: ['name', 'email', ['photo','profile']]
            },
          ]
        },
      ]
    });
    if (groups) {
      res.json({ message: 'success', data: groups, 'status_code': 200 });
    }
  }
  catch (err) {
    console.log(err);
    res.json({
      'status': 'ERROR',
      'messages': err,
      'data': {},
      'status_code': 400
    })
  }
});

/**
 * update group
 */
router.post('/update-group/:group_id', async function (req, res, next) {
  try {
    const updateGroup = await models.Groups.update({ group_name: req.body.group_name }, { where: { 'id': req.params.group_id } });
    if (updateGroup) {
      res.json({ message: 'success', 'status_code': 200 });
    }
  }
  catch (err) {
    res.json({
      'status': 'ERROR',
      'messages': err.messages,
      'data': {},
      'status_code': 400
    })
  }
});

/**
 * create new group
 */
router.post('/create-group', async function (req, res, next) {
  try {
    const newGroup = await models.Groups.create({ group_name: req.body.group_name, created_by: req.headers.id });
    if (newGroup) {
      if (req.body.members) {
        if (req.body.members.length > 0) {
          for (let index = 0; index < req.body.members.length; index++) {
            const id = req.body.members[index].id;
            await models.GroupHasMember.create({ group_id: newGroup.id, member_id: id });
          }
        }
      }
      res.json({ message: 'success', 'status_code': 200 });
    }
  }
  catch (err) {
    res.json({
      'status': 'ERROR',
      'messages': err.messages,
      'data': {},
      'status_code': 400
    })
  }
});

/**
 * get contacts
 */
router.get('/contacts', async function (req, res, next) {
  try {
    let members = await models.Members.findAll({
      attributes: ['id', 'name', 'email', ['photo','profile'], [models.sequelize.literal(`concat('${req.protocol}://${req.hostname}:3000/',photo)`), 'profile']]
    });
    console.log(members);
    if (members) {
      res.json({ 'status_code': 200, message: 'success', data: members });
    }
  }
  catch (err) {
    res.json({
      'status': 'ERROR',
      'messages': err.messages,
      'data': {},
      'status_code': 400
    })
  }
});



module.exports = router;
