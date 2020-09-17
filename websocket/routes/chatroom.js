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
          attributes: ['name', 'email', 'photo', [models.sequelize.literal(`concat('${req.protocol}://${req.hostname}:3000/',created.photo)`), 'profile']]
        },
        {
          model: models.Chats,
          as: 'messages',
          attributes: ['message'],
          include: [
            {
              model: models.Members,
              as: 'created',
              attributes: ['name', 'email', 'photo', [models.sequelize.literal(`concat('${req.protocol}://${req.hostname}:3000/',created.photo)`), 'profile']]
            }
          ]
        }
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
  console.log(req.headers);
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
          attributes: ['name', 'email', 'photo', [models.sequelize.literal(`concat('${req.protocol}://${req.hostname}:3000/',created.photo)`), 'profile']]
        },
        {
          model: models.Chats,
          as: 'messages',
          attributes: ['id','message', 'created_at'],
          order: [
            ['id', 'DESC']
          ],
          include: [
            {
              model: models.Members,
              as: 'created',
              attributes: ['name', 'email', 'photo', [models.sequelize.literal(`concat('${req.protocol}://${req.hostname}:3000/',created.photo)`), 'profile']]
            }
          ]
        }
      ]
    });
    if (groups) {
      res.json({ message: 'success', data: groups, 'status_code': 200 });
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
