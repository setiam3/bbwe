'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Groups extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      Groups.belongsTo(models.Members,{foreignKey: 'created_by', as: 'created'});
      Groups.hasMany(models.Chats,{foreignKey: 'group_id', as: 'messages'});
    }
  };
  Groups.init({
    id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      autoIncrement: true,
      primaryKey: true,
    },
    createdAt:{
      field:'created_at',
      type: DataTypes.DATE
    },
    updatedAt:{
      field:'updated_at',
      type: DataTypes.DATE
    },
    group_name: DataTypes.STRING
  },
    {
      sequelize,
      modelName: 'Groups',
      tableName: 'chatroom_group',
    });
  return Groups;
};