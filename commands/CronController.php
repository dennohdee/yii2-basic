<?php

namespace app\commands;

use app\models\Article;
use app\models\Schedule;
use Yii;
use yii\console\ExitCode;
use yii\console\Controller;

class CronController extends Controller
{
    // auto post scheduled articles `$ php yii cron/schedules`
    public function actionSchedules()
    {
        Yii::info("Running task: Post due scheduled Articles", 'cron');

        //get scheduled posts
        $scheduledPosts = Schedule::find()->where(['schedule_time' => date('Y-m-d')])->all();
        if($scheduledPosts){
            foreach($scheduledPosts as $schedule){
                $post = new Article();
                $post->title = $schedule->title;
                $post->body = $schedule->content;
                $post->save();
            }
        }
        // Your scheduled task logic here
        echo "Articles Sent.\n";

        return ExitCode::OK;
    }
}
