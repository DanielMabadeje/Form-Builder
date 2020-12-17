<?php

class Template
{

    private $vars = array();


    public function assign($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function render($template_name)
    {
        $path = '../app/mails/html/' . $template_name . '.html';


        // var_dump($this->vars);
        // die;

        foreach ($this->vars as $key => $value) {
            if (is_array($this->vars[$key])) {
                $array[$key] = $this->vars[$key];
                unset($this->vars[$key]);
            }
        }
        if (file_exists($path)) {
            $contents = file_get_contents($path);

            foreach ($this->vars as $key => $value) {
                $contents = preg_replace('/\[\[' . $key . '\]\]/', $value, $contents);
            }

            foreach ($array as $key => $value) {
                // echo $key;

                $value = json_encode($value);

                // echo $value;
                $contents = preg_replace('/\{\{' . $key . '\}\}/', $value, $contents);
            }


            $contents = preg_replace('/\<\?\p\h\p  .*  \?\>/', '<?php $1 ?>', $contents);

            $contents = preg_replace('/\<\!\-\- if (.*)  \-\-\>/', '<?php if ($1) : ?>', $contents);
            $contents = preg_replace('/\<\!\-\- else  \-\-\>/', '<?php else : ?>', $contents);
            $contents = preg_replace('/\<\!\-\- endif  \-\-\>/', '<?php endif; ?>', $contents);

            $contents = preg_replace('/\<\!\-\- foreach(.*)  \-\-\>/', '<?php foreach($1): ?>', $contents);
            $contents = preg_replace('/\<\!\-\- endforeach  \-\-\>/', '<?php endforeach; ?>', $contents);

            // $contents=preg_replace('/\[ year \]/', date(Y) , $contents);
            // $contents=preg_replace('/\[ year \]/', date('Y') , $contents);


            return (' ?>' . $contents . '<?php ');
        } else {
            exit;
        }
    }
}
