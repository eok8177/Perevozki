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

    public function menuPages()
    {
        $response = [
            ['url' => 'Room-moving', 'title' => 'Квартирный переезд'],
            ['url' => 'Office-relocation', 'title' => 'Офисный переезд'],
            ['url' => 'Cargo-taxi', 'title' => 'Грузовое такси'],
            ['url' => 'Passenger-Transportation', 'title' => 'Пассажирские перевозки'],
            ['url' => 'Export-of-a-stroymusor', 'title' => 'Вывоз строймусора']
        ];
        return response()->json($response, 200);
    }

    public function page($slug = false)
    {
        $response = [
            'title' => "Название статьи $slug",
            'text' => '
                <div class="info__col">
                <h2 class="info__title">Комфортный переезд на новую квартиру в Киеве</h2>
                <p class="info__text">С ростом строительства квартирный переезд в Киеве стал частым событием. Киевляне покупают новое жилье, меняют районы. Кроме того, в столицу Украины переезжают люди з других городов и областей. Покупка новой квартиры или аренда лучшего жилья кроме радости приносит немало забот.</p>
                <p class="info__text">Перевозка мебели и всех вещей занимает время и требует много усилий. Чтобы все оперативно перевезти на новую квартиру в целости и сохранности, нужно тщательно подготовиться к переезду и к перевозке мебели.</p>
                <p class="info__text">Компания грузоперевозки в г. Киев Корона-Транс полностью организовывает и проводит Ваш квартирный переезд в Киеве. Ми работаем оперативно и по самым выгодным расценкам. В Корона-Транс – большой современный парк автомобилей для перевозки мебели и вещей, а также команды квалифицированных грузчиков. Наши менеджеры прилагают усилия, чтобы сделать переезд в Вашу новую квартиру максимально комфортным.</p>
                <p class="info__text">Полный комплекс услуг при переезде на новую квартиру</p>
                <p class="info__text">Разборка и сборка мебели, шкафов</p>
                <p class="info__text">Упаковка мебели</p>
                <p class="info__text">Упаковка личных вещей</p>
                <p class="info__text">Упаковка Ваших предметов интерьера</p>
                <p class="info__text">Отключение и подключение техники</p>
                <p class="info__text">Демонтаж кухни и монтаж на новом месте</p>
                <p class="info__text">Погрузка в мебельный фургон Ваших вещей</p>
                <p class="info__text">Аккуратная транспортировка мебельным автофургоном</p>
                <p class="info__text">Выгрузка и занос на соответствующий этаж</p>
                <p class="info__text">Распаковка и расстановка мебели и других вещей</p>
                <p class="info__text">Сборка мягкой и корпусной мебели</p>
                <p class="info__text">Вывоз и утилизация использованного упаковочного материала</p>
                <p class="info__text">Подготовка переезда квартиры, погрузка и разгрузка мебели</p>
                <p class="info__text">Мы полностью подготовим переезд квартиры в Киеве, а также подготовим ваши вещи к переезду, погрузим их в автомобиль и перевезем. Также у нас недорого можно заказать погрузку и разгрузку мебели, или просто арендовать автомобиль из нашего автопарка для квартирного переезда.</p>
                <p class="info__text">В Корона-Транс – квалифицированные специалисты, грузчики, упаковщики. Каждый из них проходит специальное обучение. Используется профессиональный инструмент для мебели и демонтажа.</p>
                </div>
                <div class="info__col">
                <h2 class="info__title">Сколько стоит квартирный переезд в Киеве?</h2>

                <p class="info__text">Быстрый квартирный переезд по доступной цене это реально благодаря Корона-Транс! Цена квартирного переезда зависит всегда от объёма вещей и мебели. Подчеркнем сразу, что тариф будет напрямую зависеть от объёма мебели и вещей, от расстояния, но также и от планирования важного для Вас мероприятия.</p>
                <p class="info__text">Тарифы на автомобиль на сайте Корона-Транс указаны с учетом пробега автомобиля до 5 км по Киеву. Если длительность маршрута превышает это расстояние, позвоните оператору и он с удовольствием Вас проконсультирует по тарифам для Вашего случая.</p>
                <p class="info__text">Исходя из того, какой объем груза нужно перевезти и на какое расстояние доставить, менеджер подбирает оптимальный автомобиль из автопарка грузового такси Корона-Транс и команда грузчиков для выполнения заказа. Мы предоставим машину, в кузове которой легко разместятся все вещи и почти не останется свободного места.</p>
                <p class="info__text">В Корона-Транс вы можете заказать:</p>
                <p class="info__text">Грузовой автомобиль с грузчиками</p>
                <p class="info__text">Автомобиль без грузчиков: квартирный переезд недорого</p>
                <p class="info__text">Услуги грузчиков без автомобиля: квартирный переезд дешево</p>
                <p class="info__text">Квартирный переезд под «ключ». Мы все делаем за Вас</p>
                <p class="info__text">Планировка квартирного переезда: как переехать недорого</p>
                <p class="info__text">Заранее определитесь с количеством перевозимых вещей, мебели и их объёмом. Сократить расходы на переезд на новую квартиру можно при выборе автомобиля. Для переезда в пределах Киева, с небольшим объёмом мебели, вполне хватит автомобиля на 1.5 - 2 тонны. В этом случае можно заказать у нас Газель.</p>
                <p class="info__text">Определите нужное число грузчиков. Опит подсказывает, что оптимальное количество грузчиков для квартирного переезда – от 2 до 6 человек. Важными факторами являются также: этажность, наличие лифта, вес и габариты Вашего груза. Составьте список всего, что будете перевозить: шкаф, диван, холодильник. Расскажите нашему менеджеру для оценки объёма и сложности.</p>
                <p class="info__text">Грамотно спланировать переезд – сэкономить деньги</p>
                <p class="info__text">Предварительная подготовка очень важна для удачного квартирного переезда. Хорошо укомплектованные и подготовленные заблаговременно вещи и мебель сэкономят Вам время, а значит деньги. Наши специалисты учитывают все детали переезда в каждом конкретном случае и помогут Вам грамотно спланировать квартирный переезд.</p>
                <p class="info__text">В зависимости от Ваших пожеланий, Корона-Транс осуществит для Вас квартирный переезд под ключ или предоставит ряд отдельных полезных услуг по грузоперевозке. Несколько часов – и все будет аккуратно расставлено и разложено на новом месте, а Вы будете наслаждаться комфортом Вашего нового жилья.</p>

                </div>
            '
        ];
        return response()->json($response, 200);
    }


    public function buses()
    {
        $response = [
            ['slug' => 'bus-1', 'title' => '1,5 тонны', 'img' => '/img/bus-small.png'],
            ['slug' => 'bus-2', 'title' => '2 тонны', 'img' => '/img/bus-small.png'],
            ['slug' => 'bus-3', 'title' => '3-тонник', 'img' => '/img/bus-small.png'],
            ['slug' => 'bus-4', 'title' => '5-тонник', 'img' => '/img/bus-small.png'],
            ['slug' => 'bus-5', 'title' => '10-тонник', 'img' => '/img/bus-small.png'],
            ['slug' => 'bus-6', 'title' => '20-тонник', 'img' => '/img/bus-small.png']
        ];
        return response()->json($response, 200);
    }

}
