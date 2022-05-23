@php
    function sum($category){
            $sum = $category->products->count();
            foreach ($category->children as $sub){
                $sum += $sub->products->count();
            }
            return $sum;
    }
@endphp
@foreach($categories as $category)
    <li>
        <label class="check">
            <input type="checkbox" name="category[]" value="{{$category->id}}"  @if(isset($qs["category"]) && in_array($category->id, $qs["category"])) checked @endif>
            <span class="checkmark"></span>
        </label>
        <a href="#">
            <b>{{$category->name}}</b>
            <span class="quantity">({{sum($category)}})</span>
        </a>
    </li>
@endforeach
