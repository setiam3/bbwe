var express = require('express');
var router = express.Router();
var models = require('./../models/index');


/* GET home page. */
router.get('/', function (req, res, next) {
  res.render('index', { title: 'Express' });
});

/**
 * chat list
 */
router.get('/chatrooms', async function (req, res, next) {
  try {
    const groups = await models.Groups.findAll({
      attributes : [['id','group_id'],'group_name'],
      include:[
        {
          model: models.Members,
          as:'created',
          attributes:['name','email']
        },
        {
          model: models.Chats,
          as:'messages',
          attributes:['message']
        }
      ]
    });
    let data={};
    data.groups=groups;
    res.json({data:data});
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



module.exports = router;
