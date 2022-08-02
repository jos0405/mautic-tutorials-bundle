<?php

namespace MauticPlugin\MauticTutorialsBundle\Model;

use Mautic\CoreBundle\Model\FormModel;

class TutorialModel extends FormModel
{
    public function getRepository()
    {
        // We do not use ORM so it does not matter which repo. we get
        return $this->em->getRepository('MauticLeadBundle:Lead');
    }

    public function countEmails() {

        $table = MAUTIC_TABLE_PREFIX . 'email_stats';

        $sql = sprintf("SELECT COUNT(email_address) AS email FROM %s; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countPageHits() {

        $table = MAUTIC_TABLE_PREFIX . 'page_hits';

        $sql = sprintf("SELECT COUNT(id) AS page_hit FROM %s; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countPageHitsFromLast30Days() {

        $table = MAUTIC_TABLE_PREFIX . 'page_hits';

        $sql = sprintf("SELECT COUNT(id) AS page_hit FROM %s WHERE DATE(date_hit) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE(); ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countUnknown() {

        $table = MAUTIC_TABLE_PREFIX . 'leads';

        $sql = sprintf("SELECT count(id) as unknown FROM %s WHERE email IS NULL; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countKnown() {

        $table = MAUTIC_TABLE_PREFIX . 'leads';

        $sql = sprintf("SELECT count(id) as known FROM %s WHERE email IS NOT NULL; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countFormSubmissions() {

        $table = MAUTIC_TABLE_PREFIX . 'form_submissions';

        $sql = sprintf("SELECT count(id) as forms FROM %s; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countTemplateEmails() {

        $table = MAUTIC_TABLE_PREFIX . 'emails';

        $sql = sprintf("SELECT count(id) as template_emails FROM %s WHERE email_type = 'template'; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countCampaigns() {

        $table = MAUTIC_TABLE_PREFIX . 'campaigns';

        $sql = sprintf("SELECT count(id) as campaigns FROM %s; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countSegmentEmails() {

        $table = MAUTIC_TABLE_PREFIX . 'emails';

        $sql = sprintf("SELECT count(id) as segment_emails FROM %s WHERE email_type = 'list'; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countSegments() {

        $table = MAUTIC_TABLE_PREFIX . 'lead_lists';

        $sql = sprintf("SELECT COUNT(id) AS segments FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

   public function countDyn() {

        $table = MAUTIC_TABLE_PREFIX . 'dynamic_content';

        $sql = sprintf("SELECT COUNT(id) AS dyn FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

	    public function countDynview() {

        $table = MAUTIC_TABLE_PREFIX . 'dynamic_content_stats';

        $sql = sprintf("SELECT COUNT(id) AS dynview FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

   public function countFocus() {

        $table = MAUTIC_TABLE_PREFIX . 'focus';

        $sql = sprintf("SELECT COUNT(id) AS focus FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countImports() {

        $table = MAUTIC_TABLE_PREFIX . 'imports';

        $sql = sprintf("SELECT COUNT(id) AS imports FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countDnc() {

        $table = MAUTIC_TABLE_PREFIX . 'lead_donotcontact';

        $sql = sprintf("SELECT COUNT(id) AS dnc FROM %s ; WHERE reason = 1", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countBounce() {

        $table = MAUTIC_TABLE_PREFIX . 'lead_donotcontact';

        $sql = sprintf("SELECT COUNT(id) AS bounce FROM %s WHERE reason = 2; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countAssets() {

        $table = MAUTIC_TABLE_PREFIX . 'assets';

        $sql = sprintf("SELECT COUNT(id) AS assets FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countFormActions() {

        $table = MAUTIC_TABLE_PREFIX . 'form_actions';

        $sql = sprintf("SELECT COUNT(id) AS form_actions FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countCompanies() {

        $table = MAUTIC_TABLE_PREFIX . 'companies';

        $sql = sprintf("SELECT COUNT(id) AS companies FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countStages() {

        $table = MAUTIC_TABLE_PREFIX . 'stages';

        $sql = sprintf("SELECT COUNT(id) AS stages FROM %s ; ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countEmails30Day() {

        $table = MAUTIC_TABLE_PREFIX . 'email_stats';

        $sql = sprintf("SELECT COUNT(email_address) AS emails FROM %s WHERE DATE(date_sent) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE(); ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countEmailsYDay() {

        $table = MAUTIC_TABLE_PREFIX . 'email_stats';

        $sql = sprintf("SELECT COUNT(email_address) AS emails FROM %s WHERE DATE(date_sent) BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE(); ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public function countPageHits30Day() {

        $table = MAUTIC_TABLE_PREFIX . 'page_hits';

        $sql = sprintf("SELECT COUNT(id) AS page_hits FROM %s WHERE DATE(date_hit) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE(); ", $table);

        $s = $this->em->getConnection()->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

}
