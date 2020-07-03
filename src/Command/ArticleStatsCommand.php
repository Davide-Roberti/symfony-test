<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ArticleStatsCommand extends Command
{
    protected static $defaultName = 'article:stats';

    protected function configure()
    {
        $this
            ->setDescription('Restituisce le statistiche degli articoli')
            ->addArgument('slug', InputArgument::REQUIRED, 'lo slug dell\' articolo')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'Formato output', 'text')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $slug = $input->getArgument('slug');

        $data = [
            'slug' => $slug,
            'hearts' => rand(10, 100),
        ];

        switch ($input->getOption('format')) {
            case 'text';
                $io->listing($data);
                break;
            case 'json';
                $io->write(json_encode($data));
                break;
            default:
                throw new \Exception('ma che è?');
        }
    }
}
