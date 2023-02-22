<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Swimmer-Rubber-Duck.webp
        for($i = 0; $i < 5; $i++){
            $new_member = new TeamMember();
            $new_member->name = "Pinco";
            $new_member->surname = "Palla";
            $new_member->li_link = "https://www.linkedin.com/";
            $new_member->gh_link = "https://github.com/";
            $new_member->ig_link = "https://www.instagram.com/";
            $new_member->img = "uploads/Swimmer-Rubber-Duck.webp";
            $new_member->save();
        }

    }
}
