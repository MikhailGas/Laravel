<?php

namespace App\Services;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Categories;
use App\Models\News;

class XMLParserService {
    public function saveNews($link){
       
        $xml = XmlParser::load($link);
        
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'image' => ['uses' => 'channel.image.url'],
                'news' => ['uses' => 'channel.item[title,link,description,category,enclosure::url]'],
            ]);
        
            foreach($data['news'] as $item){
                if($item['category'] == null) $item['category'] = $data['title'];
                $category = Categories::where('name', $item['category'])->first();
            
                if(isset($category->id)){
                    
                }
                else{
                    $category = new Categories();
                    $category->name = $item['category'];
                    $category->slug = $this->RusToLat($item['category']);
                    $category->save();
                    
                }
                
                $news = News::where('title', $item['title'])->first();
                if(isset($news->id)){

                }
                else{
                    $news = new News();
                    $news->title = $item['title'];
                    $news->text = $item['description'];
                    $news->isPrivate = false;
                    $news->category_id = $category->id;
                    $news->image = $item['enclosure::url'];
                    $news->source = $data['title'];
                    $news->link = $item['link'];
                    
                    
                    $news->save();
                }
            
                
            }
            
    
    }
    private function RusToLat($source=false) {
        if ($source) {
            $rus = [
                'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
                'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',' '
            ];
            $lat = [
                'A', 'B', 'V', 'G', 'D', 'E', 'Yo', 'Zh', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Shch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya',
                'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_'
            ];
            return str_replace($rus, $lat, $source);
        }
    }
    
}