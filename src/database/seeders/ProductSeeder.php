<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('products')->truncate();
        DB::table('product_season')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Product::insert([
            [
                'name' => 'キウイ',
                'price' => 800,
                'description' => 'キウイは酸味と甘味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素を豊富に含み、美容や健康に良いとされています。さまざまなフルーツのスムージーに加えて楽しんでください！',
                'image' => 'storage/products/kiwi.png',
            ],
            [
                'name' => 'イチゴ',
                'price' => 600,
                'description' => '大人から子供まで大人気のスムーズフルーツ。甘くて酸味があり、ビタミンCが豊富に含まれています。ビタミンCは美肌効果があるとされ、女性に人気のフルーツです。スムージーにすると、鮮やかな赤色が映えて見た目も美しいです。',
                'image' => 'storage/products/strawberry.png',
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => '爽やかな香りと酸味が特徴のスムーズフルーツ。オレンジにはビタミンCが豊富に含まれており、免疫力を高める効果があります。さっぱりとした味わいで、朝食やリフレッシュしたい時にぴったりです。',
                'image' => 'storage/products/orange.png',
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => '甘くてジューシーな果肉が魅力のスムーズフルーツ。水分が豊富で、夏の暑い日にぴったりのフルーツです。スイカにはリコピンやシトルリンなどの成分が含まれており、美容や健康にも良いとされています。',
                'image' => 'storage/products/watermelon.png',
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => '甘くて香り高い果肉が特徴のスムーズフルーツ。ビタミンCや食物繊維が豊富に含まれており、美容や健康に良いとされています。スムージーにすると、まろやかな味わいが楽しめます。',
                'image' => 'storage/products/peach.png',
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1200,
                'description' => '高級感あふれる見た目と甘さが魅力のスムーズフルーツ。シャインマスカットにはポリフェノールが含まれており、抗酸化作用が期待できます。スムージーにすると、爽やかな味わいが楽しめます。',
                'image' => 'storage/products/muscat.png',
            ],
            [
                'name' => 'パイナップル',
                'price' => 750,
                'description' => '甘味と酸味が絶妙なバランスのスムーズフルーツ。ビタミンCやブロメラインなどの成分が含まれており、消化を助ける効果があります。スムージーにすると、トロピカルな味わいが楽しめます。',
                'image' => 'storage/products/pineapple.png',
            ],
            [
                'name' => 'ブドウ',
                'price' => 950,
                'description' => '甘くてジューシーな果肉が魅力のスムーズフルーツ。ポリフェノールが豊富に含まれており、抗酸化作用が期待できます。スムージーにすると、濃厚な味わいが楽しめます。',
                'image' => 'storage/products/grapes.png',
            ],
            [
                'name' => 'バナナ',
                'price' => 850,
                'description' => '甘くてクリーミーな味わいが特徴のスムーズフルーツ。エネルギー源として優れており、運動前や朝食にぴったりです。スムージーにすると、まろやかな味わいが楽しめます。',
                'image' => 'storage/products/banana.png',
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => '甘くてジューシーな果肉が魅力のスムーズフルーツ。ビタミンCやカリウムが豊富に含まれており、美容や健康に良いとされています。スムージーにすると、贅沢な味わいが楽しめます。',
                'image' => 'storage/products/melon.png',
            ],
        ]);

        DB::table('product_season')->insert([
            ['product_id' => 1, 'season_id' => 3], 
            ['product_id' => 1, 'season_id' => 4], 
            
            ['product_id' => 2, 'season_id' => 1], 

            ['product_id' => 3, 'season_id' => 4], 

            ['product_id' => 4, 'season_id' => 2], 

            ['product_id' => 5, 'season_id' => 2], 

            ['product_id' => 6, 'season_id' => 2], 
            ['product_id' => 6, 'season_id' => 3], 

            ['product_id' => 7, 'season_id' => 1],
            ['product_id' => 7, 'season_id' => 2],

            ['product_id' => 8, 'season_id' => 2],
            ['product_id' => 8, 'season_id' => 3],

            ['product_id' => 9, 'season_id' => 2], 

            ['product_id' => 10, 'season_id' => 2],
            ['product_id' => 10, 'season_id' => 3],
        ]);

    }
}
