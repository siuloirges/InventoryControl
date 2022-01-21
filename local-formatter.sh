# Aplicar antes de agregar los cambios en el git
CHANGED_FILES=$(git diff --name-only $1 | grep -v -E ".php_cs.dist|composer.lock|.js|.map|.css")

for FILE in $CHANGED_FILES; do
	if [[ -f "$FILE" ]]; then
		echo "format: $FILE"
		php vendor/bin/php-cs-fixer fix --using-cache=no $FILE
	fi
done

