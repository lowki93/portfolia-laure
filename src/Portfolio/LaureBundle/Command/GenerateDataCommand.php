<?php

namespace Portfolio\LaureBundle\Command;

use Portfolio\LaureBundle\Entity\AboutIntro;
use Portfolio\LaureBundle\Entity\SocialNetwork;
use Portfolio\LaureBundle\Entity\WorkExperienceCV;
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
        $em = $this->getContainer()->get("doctrine")->getManager();
        $workExperienceIntro = $em->getRepository('PortfolioLaureBundle:WorkExperienceIntro')->findAll();
        $workExperienceCV = $em->getRepository('PortfolioLaureBundle:WorkExperienceCV')->findAll();
        $socialNetwork = $em->getRepository('PortfolioLaureBundle:SocialNetwork')->findAll();
        $aboutIntro = $em->getRepository('PortfolioLaureBundle:AboutIntro')->findAll();

        $this->writeConsole($output,"start");

        if( $workExperienceIntro == null ) {
            $workExperienceIntro = new WorkExperienceIntro();
            $workExperienceIntro->setText("Enter your introduction");
            $em->persist($workExperienceIntro);
            $em->flush();
            $this->writeConsole($output,"create intro for workexperience");
        }

        if( $workExperienceCV == null ) {
            $workExperienceCV = new WorkExperienceCV();
            $em->persist($workExperienceCV);
            $em->flush();
            $this->writeConsole($output,"create cv for workExperince");
        }

        if( $socialNetwork == null ) {
            $socialNetworkArray = ["linkedin", "vimeo", "pinterest", "twitter"];
            foreach($socialNetworkArray as $social) {
                $socialNetwork = new SocialNetwork();
                $socialNetwork->setSocialNetwork($social);
                $em->persist($socialNetwork);
                $em->flush();
                $this->writeConsole($output,"create ".$social." for socialNetwork");
            }
        }

        if( $aboutIntro == null ) {
            $aboutIntro = new AboutIntro();
            $aboutIntro->setText("Enter your introduction");
            $em->persist($aboutIntro);
            $em->flush();
            $this->writeConsole($output,"create intro for aboutIntro");
        }

        $this->writeConsole($output,"end");

    }

    /**
     * @param $string
     */
    public function writeConsole($output,$string)
    {
        $output->writeln("<fg=green>[".date('j/m/y G:i:s')."] app.INFO:</fg=green> ".$string);
    }
}