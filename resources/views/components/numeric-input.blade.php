<div>
    <input 
    type="number" 
    name="{{ $name }}" 
    id="{{ $id }}" 
    value="{{ old($name, $value) }}" 
    placeholder="{{ $placeholder }}"
    
    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm {{ $attributes->get('class') }}"
    
    min="{{ is_numeric($min) ? intval($min) : 10000 }}"
    
    max="{{ is_numeric($max) ? intval($max) : 99999999 }}"
    
    oninput="if(this.value.length > {{ $maxLength }}) this.value = this.value.slice(0, {{ $maxLength }});"
    
    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
    
    >
</div>