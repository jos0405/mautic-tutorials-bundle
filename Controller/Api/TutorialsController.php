<?php
namespace MauticPlugin\MauticTutorialsBundle\Controller\Api;

use Mautic\ApiBundle\Controller\CommonApiController;
use Mautic\CoreBundle\Helper\PhpVersionHelper;
use Mautic\CoreBundle\Templating\Helper\VersionHelper;
use Symfony\Component\HttpFoundation\Response;
use Mautic\FormBundle\Entity\Form;
use Doctrine\DBAL\Connection;

class TutorialsController extends CommonApiController
{
    public function getAllAction():Response
    {
        $model = $this->getModel('form.submission');
        $repo = $model->getRepository();
        $records = $repo->getSubmissions();

        // tutorial model - custom queries.
        $tutorialModel = $this->getModel('apitutorials.tutorial');
        $tutorialRepo = $tutorialModel->getRepository();

	$rowsEmails = $tutorialModel->countEmails();
	$rowsPageHits = $tutorialModel->countPageHits();
        $rowsPageHits30Day = $tutorialModel->countPageHitsFromLast30Days();
        $rowsSegments = $tutorialModel->countSegments();
        $rowsUnknown = $tutorialModel->countUnknown();
        $rowsKnown = $tutorialModel->countKnown();
        $rowsTemplateEmails = $tutorialModel->countTemplateEmails();
        $rowsSegmentEmails = $tutorialModel->countSegmentEmails();
        $rowsCampaigns = $tutorialModel->countCampaigns();
        $rowsDyn = $tutorialModel->countDyn();
        $rowsDynView = $tutorialModel->countDynview();
        $rowsFocus = $tutorialModel->countFocus();
        $rowsImport = $tutorialModel->countImports();
        $rowsDnc = $tutorialModel->countDnc();
        $rowsBounce = $tutorialModel->countBounce();
        $rowsAssets = $tutorialModel->countAssets();
        $rowsFormActions = $tutorialModel->countFormActions();
        $rowsCompanies = $tutorialModel->countCompanies();
        $rowsStages = $tutorialModel->countStages();
        $rowsEmails30Day = $tutorialModel->countEmails30Day();
        $rowsEmailsYSay = $tutorialModel->countEmailsYDay();

        $result = [
	    "tutorialsVersion" => '1.0',
            "phpVersion"        => $this->getPhpVersion(),
            "mauticVersion"     => $this->getMauticVersion(),
	    "form_submissions"    => count($records),
            "emails" 	=> (int)$rowsEmails[0]['email'],
	    "pagehit" => (int)$rowsPageHits[0]['page_hit'],
	    "pagehits30day" => (int)$rowsPageHits30Day[0]['page_hit'],
	    "segments"	 => (int)$rowsSegments[0]['segments'],
            "unknown" 	=> (int)$rowsUnknown[0]['unknown'],
            "known" 	=> (int)$rowsKnown[0]['known'],
            "template_emails" => (int)$rowsTemplateEmails[0]['template_emails'],
            "segment_emails" => (int)$rowsSegmentEmails[0]['segment_emails'],
            "campaigns" 	=> (int)$rowsCampaigns[0]['campaigns'],
            "dyn" 		=> (int)$rowsDyn[0]['dyn'],
            "dynview" => (int)$rowsDynView[0]['dynview'],
            "focus" => (int)$rowsFocus[0]['focus'],
            "imports" => (int)$rowsImport[0]['imports'],
            "dnc" => (int)$rowsDnc[0]['dnc'],
            "bounce" => (int)$rowsBounce[0]['bounce'],
            "assets" => (int)$rowsAssets[0]['assets'],
            "form_actions" => (int)$rowsFormActions[0]['form_actions'],
            "companies" => (int)$rowsCompanies[0]['companies'],
            "stages" => (int)$rowsStages[0]['stages'],
            "emails30day" => (int)$rowsEmails30Day[0]['emails'],
            "emailsyday" => (int)$rowsEmailsYSay[0]['emails']
        ];
        return $this->json($result);
    }

    public function getPhpVersion()
    {
        return PhpVersionHelper::getCurrentSemver();        //return parent::render($version);
    }

    public function getMauticVersion()
    {
        return MAUTIC_VERSION ?? 'unknown';
    }

}
