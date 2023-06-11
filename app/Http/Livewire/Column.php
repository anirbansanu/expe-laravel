<?php
class Column {
    public $attributes;
    /**
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        if ($attributes['data'] === null) {
            throw new InvalidArgumentException("Column 'data' cannot be null.");
        }
        $this->attributes['title'] = isset($attributes['title']) ? $attributes['title'] : self::titleFormat($attributes['data']);
        $this->attributes['data'] = isset($attributes['data'])?$attributes['data']:'';
    }
    public static function titleFormat($value)
    {
        return mb_convert_case(str_replace('_', ' ', $value), MB_CASE_TITLE, 'UTF-8');
    }

}
?>
