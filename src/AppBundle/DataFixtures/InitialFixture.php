<?php 
namespace AppBundle\DataFixtures; 
 
use Faker; 
use AppBundle\Entity\Skewer; 
use AppBundle\Entity\User; 
use AppBundle\Entity\Categories; 
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager; 
 
class InitialFixture implements ORMFixtureInterface 
{ 
  public function load(ObjectManager $manager) 
  { 
    // Creating 20 users     
    for ($i = 0; $i < 20; $i++) 
    { 
      $jobFaker = Faker\Factory::create(); 
 
      // User 
      $user = new User(); 
      $user->setName("Usuario_$i"); 
      $user->setUsername("Username_$i");       
      $user->setPassword("Mortadelo");  
       
      $manager->persist($user); 
 
      // Skewer
      $skewer = new Skewer(); 
      $skewer->setName("Brocheta de gambas_$i"); 
      $skewer->setCalories("28_$i"); 
      
      $pescado = new Categories();
      $pescado->setCategory("Pescado");
      
      $skewer->setSkewerCategory($pescado); 
      
      
   
      $manager->persist($skewer); 
    } 
 
    $manager->flush(); 
  } 
 
} 