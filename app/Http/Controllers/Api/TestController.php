<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function tips()
    {
        $response = [
            0 => [
                'title' => 'Совет 0',
                'text' => 'Стоимость услуг по перевозке – один из важнейших параметров для наших клиентов, и в этом нам нет равных. На нашем сайте вы всегда сможете подобрать выгодную доставку любого груза. Кроме того, у нас часто можно найти различные спецпредложения и приятные акции, которые еще больше снижают стоимость услуг. В процессе перевозки стоимость наших услуг не меняется, поэтому вы всегда точно знаете, сколько платите, и за что. Inka Trans – правильный выбор, достойное качество.',
                'img' => '/img/tip1.jpg'
            ],
            1 => [
                'title' => 'Совет 1',
                'text' => 'Стоимость услуг по перевозке – один из важнейших параметров для наших клиентов, и в этом нам нет равных. На нашем сайте вы всегда сможете подобрать выгодную доставку любого груза. Кроме того, у нас часто можно найти различные спецпредложения и приятные акции, которые еще больше снижают стоимость услуг. В процессе перевозки стоимость наших услуг не меняется, поэтому вы всегда точно знаете, сколько платите, и за что. Inka Trans – правильный выбор, достойное качество.',
                'img' => '/img/tip2.jpg'
            ]
        ];
        return response()->json($response, 200);
    }

    public function tip($id)
    {
        $tips = [
            0 => [
                'title' => 'Стоимость услуг 0',
                'text' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>',
                'img' => '/img/tip1.jpg'
            ],
            1 => [
                'title' => 'Стоимость услуг 1',
                'text' => '<h1>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h1>
                
                <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
                
                <h2>Header Level 2</h2>
                
                <ol>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                </ol>
                
                <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>
                
                <h3>Header Level 3</h3>
                
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                </ul>
                
                <pre><code>
                #header h1 a { 
                    display: block; 
                    width: 300px; 
                    height: 80px; 
                }
                </code></pre>',
                'img' => '/img/tip2.jpg'
            ]
        ];
        return response()->json($tips[$id], 200);
    }

}
