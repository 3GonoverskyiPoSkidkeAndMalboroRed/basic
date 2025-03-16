namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Music extends ActiveRecord
{
    public static function tableName()
    {
        return 'music'; // Укажите имя таблицы в базе данных
    }

    public function rules()
    {
        return [
            [['title', 'artist', 'album'], 'required'],
            [['title', 'artist', 'album'], 'string', 'max' => 255],
        ];
    }
} 