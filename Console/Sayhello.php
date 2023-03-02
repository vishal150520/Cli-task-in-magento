<?php

namespace Bluethink\Grid\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Bluethink\Grid\Model\GridFactory;

class Sayhello extends Command
{
    var $gridFactory;
	
    public function __construct(
        \Bluethink\Grid\Model\GridFactory $gridFactory
    ) {
        parent::__construct();
        $this->gridFactory = $gridFactory;
    }
	
	const COPY = 'copy';
    const PRODUCTID = 'productid';

	protected function configure()
	{

		$options = [
			new InputOption(
				self::COPY,
				null,
				InputOption::VALUE_REQUIRED,
				'Copy'
            ),
            new InputOption(
				self::PRODUCTID,
				null,
				InputOption::VALUE_REQUIRED,
				'Productid'
            ),
		];

		$this->setName('product:copyproduct')
			->setDescription('Demo command line')
			->setDefinition($options);

		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		if ($copy = $input->getOption(self::COPY) and $productid=$input->getOption(self::PRODUCTID)) 
        {
			$model = $this->gridFactory->create();
			$model->setTitle($copy);
			$n=$copy;
			for($i=0;$i<$n;$i++)
			{
				$random_number_array = range(100000,999999);
				shuffle($random_number_array );
				$random_number_array = array_slice($random_number_array ,1,$n);
				$randomid= implode(",",$random_number_array);
				$model->setContent($randomid);
			} 
			$model->save();
		}

		return $this;

	}
}
