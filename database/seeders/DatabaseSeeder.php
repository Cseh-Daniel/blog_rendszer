<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Label;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(3)->create();

        $lb1 = Label::create([

            'name' => "Label1"

        ]);

        $lb2 = Label::create([

            'name' => "Label2"

        ]);

        $lb3 = Label::create([

            'name' => "Label3"

        ]);

        $p = Post::create([
            'title' => 'Test Post1',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus lacinia felis at iaculis. Fusce ac dictum nisi, non fringilla ligula. Nullam ornare porttitor nisi vel scelerisque. Praesent eros purus, ultrices sed faucibus id, sagittis quis leo. Cras nec mattis neque. Donec tempor at arcu id dignissim. Mauris scelerisque enim id ex vulputate tincidunt. Vestibulum commodo nisi mi, non convallis orci fringilla sit amet. Duis ex risus, vestibulum nec rhoncus gravida, efficitur vel lorem. Suspendisse potenti. Etiam at augue lacinia, blandit dolor ut, sodales ante. Ut eu luctus enim. Pellentesque euismod, mauris nec mattis consectetur, nisl massa euismod neque, id euismod metus justo et ex. Aenean ultrices porta augue eget euismod. Curabitur quam ante, condimentum eu lacus ut, pulvinar accumsan velit. Nam at ultrices massa.',
            'user_id' => '1'
        ]);

        $p->labels()->attach([1,2]);

       $p = Post::create([
            'title' => 'Test Post2',
            'text' => 'Lórum ipse, a törő buzmos csibazság lesz az ácska, ma kövesz tanya. Karnos vazda higányban, közel gyező fikasz csimáz el rajta, amire hisztes ehető vikáp 36 balás fonlan. Puffan még 15 ködő reszendeberkel, ami egyességbe dekvő. A tatos szódumokban tiszt merebecstől nikes abasítás kesztetkes rotortalásait az erőlés (julmi) gontántás hembeszés szeletette ez bóka tegetéig.',
            'user_id' => '2'
        ]);

        $p->labels()->attach([2,3]);

       $p = Post::create([
            'title' => 'Test Post3',
            'text' => 'Bacon ipsum dolor amet strip steak alcatra cupim, tongue tri-tip capicola turducken shank pig pork belly pancetta tail meatball short loin. Shank porchetta andouille flank landjaeger pork. Short loin shoulder cupim pork chop meatloaf short ribs beef andouille chicken salami. Tri-tip shank bresaola ham hock swine biltong. ',
            'user_id' => '2'
        ]);

        $p->labels()->attach([1,3]);


        $p = Post::create([
            'title' => 'Test Post4',
            'text' => '444Bacon ipsum dolor amet strip steak alcatra cupim, tongue tri-tip capicola turducken shank pig pork belly pancetta tail meatball short loin. Shank porchetta andouille flank landjaeger pork. Short loin shoulder cupim pork chop meatloaf short ribs beef andouille chicken salami. Tri-tip shank bresaola ham hock swine biltong. ',
            'user_id' => '3'
        ]);

        $p->labels()->attach(1);

        $p = Post::create([
            'title' => 'Test Post5',
            'text' => '555Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus lacinia felis at iaculis. Fusce ac dictum nisi, non fringilla ligula. Nullam ornare porttitor nisi vel scelerisque. Praesent eros purus, ultrices sed faucibus id, sagittis quis leo. Cras nec mattis neque. Donec tempor at arcu id dignissim. Mauris scelerisque enim id ex vulputate tincidunt. Vestibulum commodo nisi mi, non convallis orci fringilla sit amet. Duis ex risus, vestibulum nec rhoncus gravida, efficitur vel lorem. Suspendisse potenti. Etiam at augue lacinia, blandit dolor ut, sodales ante. Ut eu luctus enim. Pellentesque euismod, mauris nec mattis consectetur, nisl massa euismod neque, id euismod metus justo et ex. Aenean ultrices porta augue eget euismod. Curabitur quam ante, condimentum eu lacus ut, pulvinar accumsan velit. Nam at ultrices massa.',
            'user_id' => '1'
        ]);


    }
}
