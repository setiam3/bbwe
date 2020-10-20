'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class Members extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  };
  Members.init({
    id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      autoIncrement: true,
      primaryKey: true,
    },
    name: DataTypes.STRING,
    email: DataTypes.STRING,
    photo: {
      type: DataTypes.STRING,
      get(val) {
        return 'http://localhost:3000/' + val;
      }
    }
  },
    {
      sequelize,
      modelName: 'Members',
      tableName: 'member',
      timestamps: false
    });
  return Members;
};