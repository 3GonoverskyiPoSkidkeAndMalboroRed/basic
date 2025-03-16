namespace app\controllers;

use Yii;
use app\models\Music;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MusicController extends Controller
{
    public function actionIndex()
    {
        $musicList = Music::find()->all(); // Получаем все записи музыки

        return $this->render('index', [
            'musicList' => $musicList,
        ]);
    }

    public function actionView($id)
    {
        $music = $this->findModel($id);

        return $this->render('view', [
            'music' => $music,
        ]);
    }

    public function actionUpdate($id)
    {
        $music = $this->findModel($id);

        if ($music->load(Yii::$app->request->post()) && $music->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'music' => $music,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Music::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
} 