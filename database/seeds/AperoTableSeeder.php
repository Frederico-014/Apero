<?php

use Illuminate\Database\Seeder;

class AperoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uploads=public_path(env('UPLOADS'));
        $files=File::allFiles($uploads);

        foreach($files as $file)
        {
            File::delete($file);
        }

        factory(App\Apero::class,25)->create()->each(function ($apero) use($uploads)
        {
            $tagsId=[1,2,3,4,5];
            shuffle($tagsId);
            $apero->tags()->attach([$tagsId[0],$tagsId[1]]);

            $apero->uri=$uri= str_random(12).'.jpg';
            $apero->save();

            $fileName=file_get_contents('http://lorempicsum.com/futurama/350/200/'.rand(1,9));

            File::put($uploads.DIRECTORY_SEPARATOR.$uri,$fileName);


        });

    }
}
