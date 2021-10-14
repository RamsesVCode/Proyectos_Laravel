git status
git add .
git commit -m %1
git tag -a %2 -m %1
git push origin main
git push origin %2