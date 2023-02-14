<?php

namespace App\Command;

use App\Repository\AnnoncesCopyRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

#[AsCommand(
    name: 'app:sendmail',
    description: 'Add a short description for your command',
)]
class SendmailCommand extends Command
{
    const EMAIL_FROM = 'contact@easymandat.fr';
    const EMAIL_TO = 'contact@easymandat.fr';

    /**
     * @var AnnoncesCopyRepository $annoncesCopyRepository
     */
    private $annoncesCopyRepository;

    /**
     * @var Environment $environment
     */
    private $environment;

    /**
     * @var MailerInterface $mailer
     */
    private $mailer;

    public function __construct(AnnoncesCopyRepository $annoncesCopyRepository, Environment $environment, MailerInterface $mailer)
    {
        parent::__construct('app:sendmail');
        $this->annoncesCopyRepository = $annoncesCopyRepository;
        $this->environment = $environment;
        $this->mailer = $mailer;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $content = $this->environment->render('mailing.html.twig', ['annonces_copy' => $this->annoncesCopyRepository->findAll()]);

        $email = (new Email())
            ->from(self::EMAIL_FROM)
            ->to(self::EMAIL_TO)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Liste des annonces')
            ->html($content);

        $this->mailer->send($email);

        $output->write("Email sent to " . self::EMAIL_TO);

        return true;
    }
}
