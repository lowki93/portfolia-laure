<?php

namespace Portfolio\LaureBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Portfolio\LaureBundle\Entity\WorkExperienceIntro;

class GenerateDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('laure:generate-data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->getContainer()->get("logger");

        $em = $this->getContainer()->get("doctrine")->getManager();
        $workExperienceIntro = $em->getRepository('PortfolioLaureBundle:WorkExperienceIntro')->findAll();
        $logger->info("start");

        if( $workExperienceIntro == null ) {
            $workExperienceIntro = new WorkExperienceIntro();
            $workExperienceIntro->setText("Entre ton introduction");
            $em->persist($workExperienceIntro);
            $em->flush();
            $logger->info("create intro for workExperience");
        }

        $logger->info("end");

    }
}