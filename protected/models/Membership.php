<?php

/**
 * This is the model class for table "membership".
 *
 * The followings are the available columns in table 'membership':
 * @property integer $id
 * @property integer $kimsin
 * @property integer $profession
 * @property string $isim
 * @property string $soyadı
 * @property string $mobile
 * @property string $parola
 * @property integer $ilce
 * @property integer $sehir
 * @property integer $created_at
 * @property integer $updated_at
 */
class Membership extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'membership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kimsin, profession, isim, soyadı, mobile, parola, ilce, sehir', 'required'),
			array('kimsin, profession, ilce, sehir, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('isim, soyadı, mobile, parola', 'length', 'max'=>255),
			array('id, kimsin, profession, isim, soyadı, mobile, parola, ilce, sehir, created_at, updated_at', 'safe'),
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
			'kimsin' => 'Kimsin',
			'profession' => 'Profession',
			'isim' => 'Isim',
			'soyadı' => 'Soyadı',
			'mobile' => 'Mobile',
			'parola' => 'Parola',
			'ilce' => 'Ilce',
			'sehir' => 'Sehir',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('kimsin',$this->kimsin);
		$criteria->compare('profession',$this->profession);
		$criteria->compare('isim',$this->isim,true);
		$criteria->compare('soyadı',$this->soyadı,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('parola',$this->parola,true);
		$criteria->compare('ilce',$this->ilce);
		$criteria->compare('sehir',$this->sehir);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
        $criteria->order = 't.id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Membership the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getKimsin(){
		$kimsins = array(
			'Son kullanıcı',
			'Kamyoncu',
		);
		return $kimsins;
	}

	public static function getProfession(){
		$professions = array(
			'Bireysel',
			'Kurumsal',
			'Kooperatif',
		);
		return $professions;
	}

	public static function getSehir(){
		$sehirs = array(
			        0	=>  'Adana',
                    3	=>  'Adıyaman',
                    4	=>  'Afyonkarahisar',
                    5	=>  'Ağrı',
                    69	=>  'Aksaray',
                    6	=>  'Amasya',
                    7	=>  'Ankara',
                    8	=>  'Antalya',
                    76	=>  'Ardahan',
                    9	=>  'Artvin',
                    10	=>  'Aydın',
                    11	=>  'Balıkesir',
                    75	=>  'Bartın',
                    73	=>  'Batman',
                    70	=>  'Bayburt',
                    12	=>  'Bilecik',
                    13  =>  'ingöl',
                    14  =>  'Bitlis',
                    15  =>    'Bolu',
                    16  =>  'Burdur',
                    17  =>'Bursa',
                    18  =>  'Çanakkale',
                    19  =>  'Çankırı',
                    20  =>  'Çorum',
                    21  =>  'Denizli',
                    22  =>  'Diyarbakır',
                    82  =>  'Düzce',
                    23  =>  'Edirne',
                    24  =>  'Elazığ',
                    25  =>  'Erzincan',
                    26  =>  'Erzurum',
                    27  =>  'Eskişehir',
                    28  =>  'Gaziantep',
                    29  =>  'Giresun',
                    30  =>  'Gümüşhane',
                    31  =>  'Hakkari',
                    32  =>  'Hatay',
                    77  =>  'Iğdır',
                    33  =>  'Isparta',
                    35  =>  'İstanbul',
                    36  =>  'İzmir',
                    47  =>  'Kahramanmaraş',
                    79  =>  'Karabük',
                    71  =>  'Karaman',
                    37  =>  'Kars',
                    38  =>  'Kastamonu',
                    39  =>  'Kayseri',
                    80  =>  'Kilis',
                    72  =>  'Kırıkkale',
                    40  =>  'Kırklareli',
                    41  =>  'Kırşehir',
                    42  =>  'Kocaeli',
                    43  =>  'Konya',
                    44  =>  'Kütahya',
                    83  =>  'Kuzey Kıbrıs Türk Cumhuriyeti',
                    45  =>  'Malatya',
                    46  =>  'Manisa',
                    48  =>  'Mardin',
                    34  =>  'Mersin',
                    49  =>  'Muğla',
                    50  =>  'Muş',
                    51  =>  'Nevşehir',
                    52  =>  'Niğde',
                    53  =>  'Ordu',
                    81  =>  'Osmaniye',
                    54  =>  'Rize',
                    55  =>  'Sakarya',
                    56  =>  'Samsun',
                    64  =>  'Şanlıurfa',
                    57  =>  'Siirt',
                    58  =>  'Sinop',
                    74  =>  'Şırnak',
                    59  =>  'Sivas',
                    60  =>  'Tekirdağ',
                    61  =>  'Tokat',
                    62  =>  'Trabzon',
                    63  =>  'Tunceli',
                    65  =>  'Uşak',
                    66  =>  'Van',
                    78  =>  'Yalova',
                    67  =>  'Yozgat',
                    68  =>  'Zonguldak',
		);
		return $sehirs;
	}
}
