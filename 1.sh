# Write shell program to get a subdirectory name from user and list the contents inside the directory.
read -p "Directory name: " dir_name

if [ ! -d "$dir_name" ]; then
	echo "Directory doesn't exist"
else
	ls "$dir_name"
fi