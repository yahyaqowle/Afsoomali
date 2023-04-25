# import re
#
# # Read in the raw text
# with open('raw_text.txt', 'r', encoding='utf-8') as f:
#     raw_text = f.read()
#
# # Replace all line breaks with spaces
# clean_text = re.sub('\n', ' ', raw_text)
#
# # Replace all double spaces with single spaces
# clean_text = re.sub('  ', ' ', clean_text)
#
# # Add a blank space after every two words
# clean_text = re.sub('(\w+\W+\w+)', '\\1 ', clean_text)
#
# # Write the cleaned text to a new file
# with open('clean_text.txt', 'w', encoding='utf-8') as f:
#     f.write(clean_text)

# import re
#
# def read_raw_text(filename):
#     with open(filename, 'r', encoding='utf-8') as file:
#         raw_text = file.read()
#     return raw_text
#
# def save_cleaned_text(text, filename):
#     with open(filename, 'w', encoding='utf-8') as file:
#         file.write(text)
#
# def clean_text(text):
#     abbreviations = ['a', 'ac', 'baay.', 'bot.', 'bul.', 'c.af', 'c.beer', 'c.cimi', 'c.fal', 'c.naf', 'c.nafl', 'ca', 'daaw.', 'dd', 'dh', 'dhaq', 'dhm', 'dii.', 'diid', 'dk', 'e', 'eb', 'e.d', 'etno.', 'f', 'fals.', 'fiis.', 'fk', 'g', 'h', 'isrog', 'j', 'jool.', 'juqr.', 'ke', 'kh', 'kiim.', 'l', 'ld', 'lg', 'lh', 'ly', 'm', 'maan.', 'mg', 'mi', 'mu', 'muus.', 'nax', 'q', 'qaan', 'qf', 'qr', 'riw', 's', 'sh.r', 'siyaa.', 'so', 't', 'taar.', 'tegno.', 'to.', 'ti', 'tus', 'u', 'u-j', 'w', 'we', 'wr', 'xi', 'xis']
#
#     # Remove any characters that are not letters, digits, or spaces
#     text = re.sub(r'[^\w\s]', '', text)
#     # Replace one or more whitespace characters with a single space
#     text = re.sub(r'\s+', ' ', text)
#     # Remove any leading or trailing whitespace
#     text = text.strip()
#
#     # Split the text into lines
#     lines = text.split('\n')
#
#     # Create an empty list to hold the cleaned lines
#     cleaned_lines = []
#
#     # Loop through each line and clean it
#     for line in lines:
#         # Split the line into words
#         words = line.split()
#
#         # Create a variable to hold the current word and its meaning
#         current_word = ''
#
#         # Loop through each word and check if it starts with K and if so, add it to the current_word variable
#         for word in words:
#             if word.startswith('K'):
#                 # If the current_word variable already has a value, add a space before adding the new word
#                 if current_word:
#                     current_word += ' '
#                 current_word += word
#
#             # Check if the word is an abbreviation
#             elif word in abbreviations:
#                 # If the current_word variable has a value, add the abbreviation to it
#                 if current_word:
#                     current_word += ' ' + word
#                 # Otherwise, add the abbreviation to the list of cleaned lines
#                 else:
#                     cleaned_lines.append(word)
#
#             # If the word is neither a K-word nor an abbreviation, add it to the current_word variable as a meaning
#             else:
#                 # If the current_word variable has a value, add the meaning to it
#                 if current_word:
#                     current_word += ' ' + word
#                     cleaned_lines.append(current_word)
#                     current_word = ''
#                 # Otherwise, add the meaning to the list of cleaned lines on its own
#                 else:
#                     cleaned_lines.append(word)
#
#         # If the current_word variable still has a value at the end of the line,
#             # If the current_word variable still has a value at the end of the line, add it to the list of cleaned lines
#             if current_word:
#                 cleaned_lines.append(current_word)
#
#             # Join the cleaned lines back into a single string
#             cleaned_text = '\n'.join(cleaned_lines)
#
#             return cleaned_text
#
#
#
#
#
#
# #Read in the raw text
# raw_text = read_raw_text('raw_text.txt')
#
# # Clean the text
# cleaned_text = clean_text(raw_text)
#
# # Save the cleaned text to a new file
# save_cleaned_text(cleaned_text, 'cleaned_data.txt')

# import re
#
# def read_raw_text(filename):
#     with open(filename, 'r', encoding='utf-8') as file:
#         raw_text = file.read()
#     return raw_text
#
# def save_cleaned_text(text, filename):
#     with open(filename, 'w', encoding='utf-8') as file:
#         file.write(text)
#
# def clean_text(text):
#     # Remove any characters that are not letters, digits, or spaces
#     text = re.sub(r'[^\w\s]', '', text)
#     # Replace one or more whitespace characters with a single space
#     text = re.sub(r'\s+', ' ', text)
#     # Remove any leading or trailing whitespace
#     text = text.strip()
#
#     # Split the text into lines
#     lines = text.split('\n')
#
#     # Create an empty list to hold the cleaned lines
#     cleaned_lines = []
#
#     # Loop through each line and clean it
#     for line in lines:
#         # Split the line into words
#         words = line.split()
#
#         # Loop through each word and check if it starts with K
#         for word in words:
#             if word.startswith('K'):
#                 # If the word is a K-word, add it to the cleaned lines
#                 cleaned_lines.append(word + ' ' + ' '.join(words[1:]))
#                 break
#
#     # Join the cleaned lines back into a single string
#     cleaned_text = '\n'.join(cleaned_lines)
#
#     return cleaned_text
#
# # Read in the raw text
# raw_text = read_raw_text('raw_text.txt')
#
# # Clean the text
# cleaned_text = clean_text(raw_text)
#
# # Save the cleaned text to a new file
# save_cleaned_text(cleaned_text, 'cleaned_data.txt')



# Open the unorganized file


# with open('unorganized.txt', 'r') as f:
#     lines = f.readlines()
#
# # Initialize variables
# word = ''
# meaning = ''
#
# # Loop through each line in the file
# for line in lines:
#     line = line.strip()
#     if line.startswith('k'):
#         # If the line starts with 'k', it is likely a word line
#         if word:
#             # If we have already stored a word and meaning pair,
#             # print it and start over
#             print(f'{word}: {meaning}')
#             word = ''
#             meaning = ''
#         word = line.split()[0]
#         meaning += ' '.join(line.split()[1:]) + ' '
#     else:
#         # If the line does not start with 'k', it is likely a meaning line
#         meaning += line + ' '
#         if line.endswith('.'):
#             # If the meaning line ends with a full stop, print the word and meaning pair
#             print(f'{word}: {meaning}')
#             word = ''
#             meaning = ''
#     # Add a newline character after the end of a meaning
#     if not line.strip():
#         print('')



# import re
#
# abbreviations = ['a', 'ac', 'baay.', 'bot.', 'bul.', 'c.af', 'c.beer', 'c.cimi', 'c.fal', 'c.naf', 'c.nafl', 'ca', 'daaw.', 'dd', 'dh', 'dhaq', 'dhm', 'dii.', 'diid', 'dk', 'e', 'eb', 'e.d', 'etno.', 'f', 'fals.', 'fiis.', 'fk', 'g', 'h', 'isrog', 'j', 'jool.', 'juqr.', 'ke', 'kh', 'kiim.', 'l', 'ld', 'lg', 'lh', 'ly', 'm', 'maan.', 'mg', 'mi', 'mu', 'muus.', 'nax', 'q', 'qaan', 'qf', 'qr', 'riw', 's', 'sh.r', 'siyaa.', 'so', 't', 'taar.', 'tegno.', 'to.', 'ti', 'tus', 'u', 'u-j', 'w', 'we', 'wr', 'xi', 'xis']
#
# with open("unorganized_data.txt", "r", encoding='utf8') as f:
#     data = f.readlines()
#
# words = []
# meanings = []
#
# for line in data:
#     line = line.strip()
#     if line:
#         if line.startswith("k") and any(line.endswith(abbr) for abbr in abbreviations):
#             if meanings:
#                 words.append(" ".join(meanings))
#                 meanings = []
#             words.append(line)
#         else:
#             meanings.append(line)
# words.append(" ".join(meanings))
#
# with open("cleaned_data.txt", "w", encoding='utf8') as f:
#     for word in words:
#         f.write(word + '\n')



# Open the unorganized file




word_meaning_pairs = []
current_pair = None

with open("unorganized_data.txt", "r") as f:
    for line in f:
        if line.startswith("t"):
            if current_pair is not None:
                word_meaning_pairs.append(current_pair)
            current_pair = {"word": line.strip(), "meaning": ""}
        else:
            if current_pair is not None:
                current_pair["meaning"] += line.strip() + " "
                if line.endswith(".\n"):
                    current_pair["meaning"] = current_pair["meaning"].strip()
                    word_meaning_pairs.append(current_pair)
                    current_pair = None

# Add the last current_pair if it exists
if current_pair is not None:
    word_meaning_pairs.append(current_pair)

with open("cleaned_data.txt", "w") as f:
    for i, pair in enumerate(word_meaning_pairs):
        f.write(pair["word"] + pair["meaning"] + "\n")
        if i < len(word_meaning_pairs) - 1:
            f.write("\n")

print("Output saved to cleaned_data.txt")














# word_meaning_pairs = []
# current_pair = None
#
# with open("unorganized_data.txt", "r") as f:
#     for line in f:
#         if line.startswith("t"):
#             if current_pair is not None:
#                 word_meaning_pairs.append(current_pair)
#             current_pair = {"word": line.strip(), "meaning": ""}
#         else:
#             if current_pair is not None:
#                 current_pair["meaning"] += line.strip() + " "
#                 if line.endswith(".\n"):
#                     current_pair["meaning"] = current_pair["meaning"].strip()
#                     word_meaning_pairs.append(current_pair)
#                     current_pair = None
#
# # Add the last current_pair if it exists
# if current_pair is not None:
#     word_meaning_pairs.append(current_pair)
#
# for pair in word_meaning_pairs:
#     print(pair["word"], pair["meaning"])












































# with open('unorganized_data.txt', 'r') as f:
#     lines = f.readlines()
#
# # Initialize variables
# word = ''
# meaning = ''
#
# # Open the file for writing
# with open('cleaned_data.txt', 'w') as f:
#     # Loop through each line in the file
#     for line in lines:
#         line = line.strip()
#         if line.startswith('t'):
#             # If the line starts with 'k', it is likely a word line
#             if word:
#                 # If we have already stored a word and meaning pair,
#                 # write it to the file and start over
#                 f.write(f'{word} {meaning}\n\n')
#                 word = ''
#                 meaning = ''
#             word = line.split()[0]
#             meaning += ' '.join(line.split()[1:]) + ' '
#         else:
#             # If the line does not start with 'k', it is likely a meaning line
#             meaning += line + ' '
#             if line.endswith('.'):
#               # if line.endswith(','):
#                 # If the meaning line ends with a full stop, write the word and meaning pair to the file
#                 f.write(f'{word} {meaning}\n\n')
#                 word = ''
#                 meaning = ''
#         # Add a newline character after the end of a meaning
#         if not line.strip():
#             f.write('\n')
