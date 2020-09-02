var express = require('express');
var router = express.Router();
var models = require('./../models/index');

router.use(function (req, res, next) {
  if (req.method !== "OPTIONS") {
    if (!req.headers.authorization) {
      return res.status(403).json({ error: 'No credentials sent!' });
    }
  }

  req.params.cobaaa='obbaaaaaaaaaaaaaaaaaa';
  next();
});

/**
 * chat list
 */
router.get('/', async function (req, res, next) {
  console.log(req.params);
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
  try {
    const newChat = await models.Chats.create({ group_id: req.params.group, created_by: 1, message: req.body.message });
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
          attributes: ['message', 'created_at'],
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
