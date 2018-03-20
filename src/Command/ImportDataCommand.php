<?php

namespace App\Command;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportDataCommand
 *
 * @package App\Command
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ImportDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('import')
            ->setDescription('Import CSV file to the database')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'CSV file'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        if (false === file_exists($file) && false === is_readable($file)) {
            $output->writeln(
                sprintf(
                    '<error>File "%s" not found or is not readable!',
                    $file
                )
            );

            return 1;
        }

        $fp = fopen($file, 'rb');

        if (false === $fp) {
            $output->writeln(
                sprintf(
                    '<error>Failed to open "%s" file!',
                    $file
                )
            );

            return 1;
        }

        $em = $this->getContainer()->get(RecipeRepository::class);

        $columnMapping = $this->getColumnMapping();
        $results       = [];

        $columnPositionMap = [];

        $isFileHeaderRead = false;
        while ($row = fgetcsv($fp)) {
            if (false === $isFileHeaderRead) {
                foreach ($row as $key => $name) {
                    if (isset($columnMapping[$name])) {
                        $columnPositionMap[$key] = $columnMapping[$name];
                    }
                }

                $isFileHeaderRead = true;
                continue;
            }

            $entity = new Recipe();
            foreach ($row as $key => $value) {
                $setterName = $columnPositionMap[$key] ?? null;

                if (null !== $setterName) {
                    $entity->$setterName($value);
                }
            }

            $em->persist($entity);
        }

        $em->flush();

        return 0;
    }

    protected function getColumnMapping(): array
    {
        return [
            'id'                       => 'setId',
            'created_at'               => 'setCreatedAt',
            'updated_at'               => 'setUpdatedAt',
            'box_type'                 => 'setBoxType',
            'title'                    => 'setTitle',
            'slug'                     => 'setSlug',
            'short_title'              => 'setShortTitle',
            'marketing_description'    => 'setMarketingDescription',
            'calories_kcal'            => 'setCaloriesKcal',
            'protein_grams'            => 'setProteinGrams',
            'fat_grams'                => 'setFatGrams',
            'carbs_grams'              => 'setCarbsGrams',
            'bulletpoint1'             => 'setBulletpoint1',
            'bulletpoint2'             => 'setBulletpoint2',
            'bulletpoint3'             => 'setBulletpoint3',
            'recipe_diet_type_id'      => 'setRecipeDietTypeId',
            'season'                   => 'setSeason',
            'base'                     => 'setBase',
            'protein_source'           => 'setProteinSource',
            'preparation_time_minutes' => 'setPreparationTimeMinutes',
            'shelf_life_days'          => 'setShelfLifeDays',
            'equipment_needed'         => 'setEquipmentNeeded',
            'origin_country'           => 'setOriginCountry',
            'recipe_cuisine'           => 'setRecipeCuisine',
            'in_your_box'              => 'setInYourBox',
            'gousto_reference'         => 'setGoustoReference',
        ];
    }
}