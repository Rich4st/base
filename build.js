const fs = require('fs-extra');
const path = require('path');

const currentFolderName = path.basename(__dirname);

// 源文件夹的路径
const sourceDir = `../${currentFolderName}`;

// 目标文件夹的路径
const targetDir = '../';

// 新文件夹的名称
const newFolderName = `${currentFolderName}-copy`;

// 构建新文件夹的完整路径
const newFolderPath = path.join(targetDir, newFolderName);

// 创建新文件夹
fs.ensureDir(newFolderPath, (err) => {
  if (err) {
    console.error('Error creating new folder:', err);
  } else {
    console.log('New folder created successfully!');

    // 使用fs-extra的copy方法进行文件夹及其目录下所有文件的复制
    fs.copy(sourceDir, newFolderPath, (copyErr) => {
      if (copyErr) {
        console.error('Error copying directory:', copyErr);
      } else {
        console.log('Directory copied to new folder successfully!');
        function findGetTemplatePartCallsInPhp(filePath, result = []) {
          const fileContent = fs.readFileSync(filePath, 'utf-8');
          const pattern = /get_template_part\s*\(\s*['"]([^'"]+)['"]/g;

          let match;
          while ((match = pattern.exec(fileContent)) !== null) {
            result.push(match[1]);
          }

          return result;
        }

        function searchPhpFiles(directoryPath) {
          const allFiles = getAllFilesInDirectory(directoryPath);
          const getTemplatePartResults = [];

          allFiles.forEach(filePath => {
            const fileExtension = path.extname(filePath).toLowerCase();

            if (fileExtension === '.php') {
              const templatePartCalls = findGetTemplatePartCallsInPhp(filePath);
              if (templatePartCalls.length > 0) {
                getTemplatePartResults.push({
                  file: filePath,
                  calls: templatePartCalls
                });
              }
            }
          });

          return getTemplatePartResults;
        }

        function getAllFilesInDirectory(directoryPath, fileList = []) {
          const files = fs.readdirSync(directoryPath);

          files.forEach(file => {
            const filePath = path.join(directoryPath, file);
            const stats = fs.statSync(filePath);

            if (stats.isDirectory()) {
              if (file !== 'node_modules') {
                getAllFilesInDirectory(filePath, fileList);
              }
            } else if (stats.isFile()) {
              fileList.push(filePath);
            }
          });

          return fileList;
        }

        const directoryPath = '.'; // 当前目录
        const results = searchPhpFiles(directoryPath);

        console.log('Results:', results);

        function extractLastSegments(results) {
          const lastSegments = [];

          results.forEach(result => {
            result.calls.forEach(call => {
              const segments = call.split('/');
              const lastSegment = segments[segments.length - 1];
              lastSegments.push(lastSegment);
            });
          });

          return lastSegments;
        }

        function deleteFilesNotInLastSegmentsArray(directoryPath, lastSegmentsArray) {
          const deletedFiles = [];

          function deletePhpFiles(directory) {
            const files = fs.readdirSync(directory);

            files.forEach(file => {
              const filePath = path.join(directory, file);
              const fileExtension = path.extname(file).toLowerCase();

              if (fs.statSync(filePath).isFile()) {
                if (fileExtension === '.php') {
                  const fileName = path.basename(file, '.php'); // 获取文件名（不含后缀）

                  if (!lastSegmentsArray.includes(fileName)) {
                    fs.unlinkSync(filePath); // 使用 unlinkSync 删除文件
                    deletedFiles.push(filePath);
                  }
                }
              } else if (fs.statSync(filePath).isDirectory()) {
                deletePhpFiles(filePath); // 递归处理子目录
              }
            });
          }

          deletePhpFiles(directoryPath);
          return deletedFiles;
        }

        const lastSegmentsArray = extractLastSegments(results);
        console.log('Last Segments:', lastSegmentsArray);

        const deletedFiles = deleteFilesNotInLastSegmentsArray('./template_parts', lastSegmentsArray);
        console.log('Deleted Files:', deletedFiles);

        function deleteEmptyFoldersRecursively(directoryPath) {
          if (fs.existsSync(directoryPath)) {
            const files = fs.readdirSync(directoryPath);

            if (files.length === 0) {
              fs.rmdirSync(directoryPath); // 删除空文件夹
              return;
            }

            files.forEach(file => {
              const filePath = path.join(directoryPath, file);

              if (fs.statSync(filePath).isDirectory()) {
                deleteEmptyFoldersRecursively(filePath); // 递归处理子文件夹
              }
            });
          }
        }

        const templatePartsPath = path.join(directoryPath, 'template_parts');
        deleteEmptyFoldersRecursively(templatePartsPath);

        fs.removeSync('./node_modules');

        fs.removeSync('./preview')

      }
    });
  }
});
