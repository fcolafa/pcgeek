<?php

class LevelLookUp{

      const A1="A1";

      const A2="A2";

      const G1="G1";

      const T1="T1";

      const C1="C1";//cliente


      // For CGridView, CListView Purposes

      public static function getLabel( $level ){

          if($level == self::A1)
             return 'A1';

          if($level == self::A2)
            return 'A2';

          if($level == self::G1)
            return 'G1';

          //Tecnicos

          if($level == self::T1)
           return 'T1';

          //Clientes

          if($level == self::C1)
            return 'C1';

      }

      // for dropdown lists purposes

      public static function getLevelList(){

          return array(

                 self::A1=>'A1',

                 self::A2=>'A2',

                 self::G1=>'G1',

                 self::T1=>'T1',

                 self::C1=>'C1',

          ); 

    }

}