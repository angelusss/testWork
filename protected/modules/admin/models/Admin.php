<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 */
class Admin extends CActiveRecord
{
    public $pwd;

    const ADMIN = 1;
    const DISABLED = 2;

    public static function getRole($role = false){
        $roles = array(
            self::ADMIN => Yii::t('admin', 'administrator'),
            self::DISABLED => Yii::t('admin', 'not active'),
        );

        if(false == $role){
            return $roles;
        } else {
            if (isset($roles[$role])){
                return $roles[$role];
            } else {
                return 'DB error';
            }
        }
    }

    public static function getRoleFilter(){
        $roles = array(
            '' => Yii::t('admin', 'All'),
            self::ADMIN => Yii::t('admin', 'admin'),
            self::DISABLED => Yii::t('admin', 'not active'),
        );

        return $roles;

    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, email, role, pwd', 'required'),
			array('role, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('login, password, email', 'length', 'max'=>255),
			array('id, login, password, email, role, created_at, updated_at, pwd', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'pwd' => 'Password',
			'email' => 'Email',
			'role' => 'Role',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

        $sort = new CSort();
        $sort->defaultOrder = 't.id asc';

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => $sort,
            'pagination' => array(
                'pageSize' => '5',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
