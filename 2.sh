# Write shell program to get two file names as command line arguments and perform comparison of these two files.
file1="$1"
file2="$2"

if [ ! -e "$file1" ]; then
	echo "File1 doesn't exist"
fi
if [ ! -e "$file2" ]; then
	echo "File2 doesn't exist"
fi

if cmp -s "$file1" "$file2"; then
	echo "Identical"
else
	echo "Different"
fi