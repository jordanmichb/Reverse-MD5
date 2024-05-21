# University of Michigan via Coursera - Building Web Applications in PHP

## Reverse-MD5

### Assignment Specifications

The application will take an MD5 value like "81dc9bdb52d04dc20036dbd8313ed055" (the MD5 for the string "1234") and check all combinations of four-digit "PIN" numbers to see if any of those PINs produce the given hash.

You will present the user with a form where they can enter an MD5 string and request that you reverse-hash the string. If you can reverse hash the string, print out the PIN. If the string does not reverse hash to a four digit number simply put out a message like "Not found".

You should also print out the first 15 attempts to reverse-hash including both the MD5 value and PIN that you were testing. You should also print out the elapsed time for your computation as shown in the sample application.

Use the GET method on your form, not POST.

A second page is included where the user can enter a value and generate an MD5 hash.
