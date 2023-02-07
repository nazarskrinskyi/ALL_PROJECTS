<?php

namespace OOP\HTML_TAGS;

class TagHelper
{

      protected array $attrs;
      public function open($name, $attrs = []): string
      {
          $this->attrs = $attrs;
          $attrsStr = $this->getAttrsStr($attrs);
          return "<$name$attrsStr>";
      }

      public function close($name): string
      {
          return "</$name>";
      }

      public function setAttr($name, $value = true):self
      {
          $this->attrs[$name] = $value;
          return $this;
      }

      // Формируем строку с атрибутами:
      private function getAttrsStr($attrs): string
      {
          if (!empty($attrs))
          {
              $result = '';
              if(isset($_REQUEST['year']))
              {
                  foreach ($attrs as $name => $value) {
                      if ($value === true) {
                          $result .= " $name";
                      } else {
                          $result .= " $name=\"$value\"";
                      }
                  }

                  return $result;
              }
          } else {
              return '';
          }
      }

}