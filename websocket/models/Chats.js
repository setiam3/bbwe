'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Chats extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  };
  Chats.init({
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
    group_id: DataTypes.INTEGER,
    message: DataTypes.STRING
  },
    {
      sequelize,
      modelName: 'Chats',
      tableName: 'chatroom_chats',
    });
  return Chats;
};