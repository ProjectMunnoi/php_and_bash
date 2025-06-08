# Write a shell script to sort the content of a file and also print the count of word in that file. 
read -p "File: " file

if [ ! -e "$file" ]; then
	echo "File doesn't exist"
else
	echo "Sorted content:"
	sort "$file"
	count=$(wc -w < "$file")
	echo "Word count: $count"
fi
