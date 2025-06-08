# Write a shell program to find the length and reverse of a number and check for palindrome condition. 
read -p "Num:" num

length=${#num}
echo "Length: $length"

reverse=$(echo "$num" | rev)
echo "Reverse: $reverse"

if [ "$num" = "$reverse" ]; then
	echo "Palindrome"
else
	echo "Not Palindrome"
fi