const fs = require('fs');
let text = fs.readFileSync('inc/acf-services.php', 'utf8');
const pattern = /(\\\$[a-zA-Z0-9_]+)\[\\\, 'placeholder' => \1\[\\\\]\['([a-zA-Z0-9_]+)'\]/g;
text = text.replace(pattern, "$1[$i]['$2'], 'placeholder' => $1[$i]['$2']");
fs.writeFileSync('inc/acf-services.php', text);
console.log('Fixed using Node');
