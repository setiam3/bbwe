'use strict';
const {
  Model
} = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  class GroupHasMember extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // group
      GroupHasMember.belongsTo(models.Groups,{foreignKey: 'group_id', as: 'group'});
      GroupHasMember.belongsTo(models.Members,{foreignKey: 'member_id', as: 'group_contact'});
    }
  };
  GroupHasMember.init({
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
    member_id: DataTypes.INTEGER,
  },
    {
      sequelize,
      modelName: 'GroupHasMember',
      tableName: 'chatroom_group_has_member',
    });

  return GroupHasMember;
};