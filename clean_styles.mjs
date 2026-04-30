import fs from 'fs';
import path from 'path';

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        isDirectory ? walkDir(dirPath, callback) : callback(path.join(dir, f));
    });
}
walkDir('./resources/views', function(filePath) {
    if (filePath.endsWith('.blade.php')) {
        let content = fs.readFileSync(filePath, 'utf8');
        let newContent = content.replace(/<style>[\s\S]*?<\/style>/gi, function(match) {
            if (match.includes('@apply') || match.includes('.btn-primary') || match.includes('.cursor-pointer')) {
                return '';
            }
            return match;
        });
        if (content !== newContent) {
            fs.writeFileSync(filePath, newContent);
            console.log('Cleaned:', filePath);
        }
    }
});
