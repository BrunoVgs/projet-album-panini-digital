<?php

namespace App\DataFixtures;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\League;
use App\Entity\Team;
use App\Entity\Player;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ApdFixtures extends Fixture
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function load(ObjectManager $manager): void
    {

        /* ---------- Leagues ---------- */

        $league = new League(); 
        $league->setName('Oclock League'); 
        $league->setCountry('Oclock Land');
        $league->setCreatedAtValue();
        $manager->persist($league);

        $league1 = new League(); 
        $league1->setName('Ligua NOS'); 
        $league1->setCountry('Portugal');
        $league1->setCreatedAtValue();
        $manager->persist($league1); 

        $league2 = new League(); 
        $league2->setName('Premier League'); 
        $league2->setCountry('Angleterre');
        $league2->setCreatedAtValue();
        $manager->persist($league2); 

        $league3 = new League(); 
        $league3->setName('Ligue 1 UberEats'); 
        $league3->setCountry('France');
        $league3->setCreatedAtValue();
        $manager->persist($league3); 

        $league4 = new League(); 
        $league4->setName('La liga'); 
        $league4->setCountry('Espagne');
        $league4->setCreatedAtValue();
        $manager->persist($league4); 

        $league5 = new League(); 
        $league5->setName('Serie A'); 
        $league5->setCountry('Italie');
        $league5->setCreatedAtValue();
        $manager->persist($league5); 

        $league6 = new League(); 
        $league6->setName('Bundesliga'); 
        $league6->setCountry('Allemagne');
        $league6->setCreatedAtValue();
        $manager->persist($league6); 

        $league7 = new League(); 
        $league7->setName('Euredivisie'); 
        $league7->setCountry('Pays-bas');
        $league7->setCreatedAtValue();
        $manager->persist($league7); 

        /* ---------- TEAM ---------- */


        $team = new Team();
        $team->setName('Oclock');
        $team->setCity('Oclock LAnd');
        $team->setStadium('Oclock Arena');
        $team->setCreatedAtValue();
        $team->setLeague($league); 
        $manager->persist($team);

        $team1 = new Team();
        $team1->setName('FC Porto');
        $team1->setCity('Porto');
        $team1->setStadium('Estádio do Dragão');
        $team1->setCreatedAtValue();
        $team1->setLeague($league1); 
        $manager->persist($team1);

        $team2 = new Team();
        $team2->setName('Real Madrid');
        $team2->setCity('Madrid');
        $team2->setStadium('Santiago Bernabeu');
        $team2->setCreatedAtValue();
        $team2->setLeague($league4); 
        $manager->persist($team2);

        $team3 = new Team();
        $team3->setName('FC Barcelone');
        $team3->setCity('Barcelone');
        $team3->setStadium('Camp nou');
        $team3->setCreatedAtValue();
        $team3->setLeague($league4); 
        $manager->persist($team3);
        
        $team4 = new Team();
        $team4->setName('Chelsea');
        $team4->setCity('Londres');
        $team4->setStadium('Stamford bridge');
        $team4->setCreatedAtValue();
        $team4->setLeague($league2); 
        $manager->persist($team4);

        $team5 = new Team();
        $team5->setName('Liverpool');
        $team5->setCity('Liverpool');
        $team5->setStadium('Anfield');
        $team5->setCreatedAtValue();
        $team5->setLeague($league2); 
        $manager->persist($team5);

        $team6 = new Team();
        $team6->setName('Manchester United');
        $team6->setCity('Manchester');
        $team6->setStadium('Old Trafford');
        $team6->setCreatedAtValue();
        $team6->setLeague($league2); 
        $manager->persist($team6);

        $team7 = new Team();
        $team7->setName('Paris Saint-Germain');
        $team7->setCity('Paris');
        $team7->setStadium('Parc des princes');
        $team7->setCreatedAtValue();
        $team7->setLeague($league3); 
        $manager->persist($team7);

        $team8 = new Team();
        $team8->setName('Arsenal');
        $team8->setCity('Londres');
        $team8->setStadium('Emirates Stadium');
        $team8->setCreatedAtValue();
        $team8->setLeague($league2); 
        $manager->persist($team8);

        $team9 = new Team();
        $team9->setName('Juventus');
        $team9->setCity('Turin');
        $team9->setStadium('Juventus Stadium');
        $team9->setCreatedAtValue();
        $team9->setLeague($league5); 
        $manager->persist($team9);

        $team10 = new Team();
        $team10->setName('Ajax');
        $team10->setCity('Amsterdam');
        $team10->setStadium('Amsterdam Arena');
        $team10->setCreatedAtValue();
        $team10->setLeague($league7); 
        $manager->persist($team10);

        $team11 = new Team();
        $team11->setName('Inter Milan');
        $team11->setCity('Milan');
        $team11->setStadium('San Siro');
        $team11->setCreatedAtValue();
        $team11->setLeague($league5); 
        $manager->persist($team11);

        $team12 = new Team();
        $team12->setName('FC Bayern Munchen');
        $team12->setCity('Munïch');
        $team12->setStadium('Allianz Arena');
        $team12->setCreatedAtValue();
        $team12->setLeague($league6); 
        $manager->persist($team12);


        /* ---------- PLAYERS ---------- */


        $player1 = new Player();
        $player1->setTeam($team);
        $player1->setFirstName('Cristiano');
        $player1->setLastName('Ronaldo');
        $player1->setNationality('Portugal');
        $player1->setPosition('Forward');
        $player1->setAge(36);
        $player1->setHeight(187);
        $player1->setCreatedAtValue();
        $manager->persist($player1);
        
        $player2 = new Player();
        $player2->setTeam($team);
        $player2->setFirstName('Lionel');
        $player2->setLastName('Messi');
        $player2->setNationality('Argentina');
        $player2->setPosition('Forward');
        $player2->setAge(34);
        $player2->setHeight(170);
        $player2->setCreatedAtValue();
        $manager->persist($player2);
        
        $player3 = new Player();
        $player3->setTeam($team);
        $player3->setFirstName('Neymar');
        $player3->setLastName('Jr');
        $player3->setNationality('Brazil');
        $player3->setPosition('Forward');
        $player3->setAge(29);
        $player3->setHeight(175);
        $player3->setCreatedAtValue();
        $manager->persist($player3);

        $player4 = new Player();
        $player4->setTeam($team);
        $player4->setFirstName('Kevin');
        $player4->setLastName('De Bruyne');
        $player4->setNationality('Belgium');
        $player4->setPosition('Midfielder');
        $player4->setAge(30);
        $player4->setHeight(181);
        $player4->setCreatedAtValue();
        $manager->persist($player4);

        $player5 = new Player();
        $player5->setTeam($team);
        $player5->setFirstName('Virgil');
        $player5->setLastName('van Dijk');
        $player5->setNationality('Netherlands');
        $player5->setPosition('Defender');
        $player5->setAge(30);
        $player5->setHeight(193);
        $player5->setCreatedAtValue();
        $manager->persist($player5);

        $player6 = new Player();
        $player6->setTeam($team);
        $player6->setFirstName('Kylian');
        $player6->setLastName('Mbappé');
        $player6->setNationality('France');
        $player6->setPosition('Forward');
        $player6->setAge(22);
        $player6->setHeight(178);
        $player6->setCreatedAtValue();
        $manager->persist($player6);

        $player7 = new Player();
        $player7->setTeam($team);
        $player7->setFirstName('Robert');
        $player7->setLastName('Lewandowski');
        $player7->setNationality('Poland');
        $player7->setPosition('Forward');
        $player7->setAge(32);
        $player7->setHeight(185);
        $player7->setCreatedAtValue();
        $manager->persist($player7);

        $player8 = new Player();
        $player8->setTeam($team);
        $player8->setFirstName('Sergio');
        $player8->setLastName('Ramos');
        $player8->setNationality('Spain');
        $player8->setPosition('Defender');
        $player8->setAge(35);
        $player8->setHeight(184);
        $player8->setCreatedAtValue();
        $manager->persist($player8);

        $player9 = new Player();
        $player9->setTeam($team);
        $player9->setFirstName('Mohamed');
        $player9->setLastName('Salah');
        $player9->setNationality('Egypt');
        $player9->setPosition('Forward');
        $player9->setAge(28);
        $player9->setHeight(175);
        $player9->setCreatedAtValue();
        $manager->persist($player9);

        $player10 = new Player();
        $player10->setTeam($team);
        $player10->setFirstName('Manuel');
        $player10->setLastName('Neuer');
        $player10->setNationality('Germany');
        $player10->setPosition('Goalkeeper');
        $player10->setAge(35);
        $player10->setHeight(193);
        $player10->setCreatedAtValue();
        $manager->persist($player10);

        
        for($i=0; $i < 2; $i++) {
            // requête vers l'API en lui passant un paramètre page correspondant à notre $i courant 
            $response = $this->client->request(
                'GET',
                'https://futdb.app/api/players?page=' . ($i + 1),
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        // pas oublier le token si nécessaire
                        // TODO: Mettre la clé dans le .env pour qu'elle soit personnelle à chacun de vous
                        'X-AUTH-TOKEN' => '60389bc8-c1f9-4b1d-9bcd-e9db7f45a8e7'
                    ],
                ]
            );

            // On récupère le contenu de la réponse qui sera du json
            $content = $response->getContent();
            // On décode donc pour se récupérer un tableau/objet php
            $players = json_decode($content);
            
            // On parcours chaque players récupérés et on défini ses données puis l'ajoute en BDD.
            foreach($players->items as $player) {
                $newPlayer = new Player();
                $newPlayer->setTeam($team1);
                if($player->firstName) {
                    $newPlayer->setFirstName($player->firstName);
                    $newPlayer->setLastName($player->firstName);
                } else {
                    $nameExploded = explode(' ', $player->name);
                    $newPlayer->setFirstName($nameExploded[0]);
                    array_shift($nameExploded);
                    $newPlayer->setLastName(implode(' ', $nameExploded));
                }
               
                $newPlayer->setNationality('France');
                $newPlayer->setPosition($player->position);
                $newPlayer->setAge($player->age);
                $newPlayer->setHeight($player->height);
                $newPlayer->setCreatedAtValue();
                $manager->persist($newPlayer);
            }
        }

        // TODO : creation de 3 utilisateurs avec pour chacun un rôle différent.

        $admin = new User();
        $admin->setUsername("administrateur");
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setAvatar("https://picsum.photos/200");
        $admin->setEmail("admin@admin.com");
        $admin->setPassword('$2y$13$C93npTTOPdbIyOxpb8QRtePRknHiazeYnivDZ4GWd4bk5uRB3TbUi');

        $admin->addPlayer($player1);
       
        $admin->addPlayer($player9);

        $manager->persist($admin);

        $managerUser = new User();
        $managerUser->setUsername("manageur");
        $managerUser->setRoles(['ROLE_MANAGER']);
        $managerUser->setAvatar("https://picsum.photos/200");
        $managerUser->setEmail("manager@manager.com");
        $managerUser->setPassword('$2y$13$x2y1i3Vnmx0ccnoHvKYxyeCIRUUtNlXfmW3zaovmF2vW7C22RanBu');
        $managerUser->addPlayer($player2);
        $managerUser->addPlayer($player8);

        $manager->persist($managerUser);

        $user = new User;
        $user->setUsername("utilisateur");
        $user->setRoles(['ROLE_USER']);
        $user->setAvatar("https://picsum.photos/200");
        $user->setEmail("user@user.com");
        $user->setPassword('$2y$13$4cXrYaLAn2X7Y7SZm5UQpu0u44yofmr5429CnmLMgO1DHYqrRekJK');
        $user->addPlayer($player1);
        $user->addPlayer( $player5);
        
        $manager->persist($user);


        $manager->flush();


    }
    

}
