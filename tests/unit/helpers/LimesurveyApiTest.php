<?php

namespace ls\tests;

/**
 */
class LimesurveyApiTest extends TestBaseClass
{
    /**
     */
    public function testGetQuestions()
    {
        // Import survey.
        $surveyFile = self::$surveysFolder . '/survey_archive_265831.lsa';
        self::importSurvey($surveyFile);

        $survey = \Survey::model()->findByPk(self::$surveyId);
        $questions = $survey->groups[0]->questions;

        /** @var LimesurveyApi */
        $api = new \LimeSurvey\PluginManager\LimesurveyApi();

        $questionsFromApi = $api->getQuestions(self::$surveyId);

        $this->assertEquals(count($questionsFromApi), count($questions));
    }
}
