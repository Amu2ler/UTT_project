/**
*@file main.c
*@brief Image compression and decompression program
*@author MULLER Arthur and HUA John
*@date 2023/06/03
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>


/**

 *@brief Compresses an image using a simple compression algorithm.
 *This function takes the path to an image file and the path to the compressed output file as input.
 *It reads the content of the image file, compresses it by replacing consecutive sequences of identical pixels with a single occurrence,
 *and writes the compressed result to the output file.
 *
 *@param[in] image_path The path to the image file to compress.
 *@param[in] output_path The path to the compressed output file.
 *
 *@return void
*/
void compress_image(const char* image_path, const char* output_path) {
    //(rb)
    FILE* input_file = fopen(image_path, "rb");
    if (input_file == NULL) {
        printf("Error opening the input file.\n");
        return;
    }

    // Get file size
    fseek(input_file, 0, SEEK_END);
    size_t input_size = ftell(input_file);
    rewind(input_file);

    // Allocate memory to read input file
    unsigned char* input_buffer = (unsigned char*)malloc(input_size);
    if (input_buffer == NULL) {
        printf("Error allocating memory.\n");
        fclose(input_file);
        return;
    }

    // Read content input file
    size_t bytes_read = fread(input_buffer, 1, input_size, input_file);
    if (bytes_read != input_size) {
        printf("Error reading the input file.\n");
        free(input_buffer);
        fclose(input_file);
        return;
    }

    fclose(input_file);

    // Allocate memory
    unsigned char* buffer = (unsigned char*)malloc(input_size * 2);
    size_t index = 0;

    // Counter for number of consecutive repetitions
    int count = 1;
    for (size_t i = 1; i < input_size; i++) {
        if (input_buffer[i] == input_buffer[i - 1]) {
            count++;
        } else {
            // Write value and count of repetitions -> buffer
            buffer[index++] = input_buffer[i - 1];
            buffer[index++] = count;
            count = 1;
        }
    }

    // Write last value and count of repetitions -> buffer
    buffer[index++] = input_buffer[input_size - 1];
    buffer[index++] = count;

    // Reallocate memory (adjust size of buffer)
    buffer = (unsigned char*)realloc(buffer, index);

    // Open output file binary mode (wb)
    FILE* output_file = fopen(output_path, "wb");
    if (output_file == NULL) {
        printf("Error opening the output file.\n");
        free(input_buffer);
        free(buffer);
        return;
    }

    // Write compressed data -> output file
    size_t bytes_written = fwrite(buffer, 1, index, output_file);
    if (bytes_written != index) {
        printf("Error writing the output file.\n");
        free(input_buffer);
        free(buffer);
        fclose(output_file);
        return;
    }

    free(input_buffer);
    free(buffer);
    fclose(output_file);
}


/**
 *
 @brief Decompresses a previously compressed image.
 *This function takes the path to a compressed file and the path to the decompressed output file as input.
 *It reads the content of the compressed file, decompresses it by repeating pixels according to the specified count,
 *and writes the decompressed result to the output file.
 *
 *@param[in] image_path The path to the compressed file to decompress.
 *@param[in] output_path The path to the decompressed output file.
 *
 *@return void
*/
void decompress_image(const char* image_path, const char* output_path) {
    //(rb)
    FILE* input_file = fopen(image_path, "rb");
    if (input_file == NULL) {
        printf("Error opening the input file.\n");
        return;
    }

    // Get file size
    fseek(input_file, 0, SEEK_END);
    long input_size = ftell(input_file);
    rewind(input_file);

    // Allocate memory to read input file
    unsigned char* input_buffer = (unsigned char*)malloc(input_size);
    if (input_buffer == NULL) {
        printf("Error allocating memory.\n");
        fclose(input_file);
        return;
    }

    // Read content input file
    size_t bytes_read = fread(input_buffer, 1, input_size, input_file);
    if (bytes_read != input_size) {
        printf("Error reading the input file.\n");
        free(input_buffer);
        fclose(input_file);
        return;
    }

    // Close input file
    fclose(input_file);

    // Allocate memory for decompressed data
    unsigned char* buffer = (unsigned char*)malloc(input_size * 2);
    int index = 0;

    for (int i = 0; i < input_size; i += 2) {
        unsigned char value = input_buffer[i];
        int count = input_buffer[i + 1];

        // Write repeated value -> buffer
        for (int j = 0; j < count; j++) {
            buffer[index++] = value;
        }
    }

    // Open output file binary mode (wb)
    FILE* output_file = fopen(output_path, "wb");
    if (output_file == NULL) {
        printf("Error opening the output file.\n");
        free(input_buffer);
        free(buffer);
        return;
    }

    // Write decompressed data -> output file
    size_t bytes_written = fwrite(buffer, 1, index, output_file);
    if (bytes_written != index) {
        printf("Error writing the output file.\n");
        free(input_buffer);
        free(buffer);
        fclose(output_file);
        return;
    }

    free(input_buffer);
    free(buffer);
    fclose(output_file);

}

/**
 *@brief Main function of the program.
 *This function handles user interaction and calls the compression and decompression functions based on the user's choice.
 *
 *@return 0 if the program runs successfully.
*/
int main() {
    int choice;
    bool exit;
    exit = true;

    while (exit == true){
        printf("What would you like to do?\n");
        printf("1. Compress an image\n");
        printf("2. Decompress an image\n");
        printf("3. Quit\n");

        // Input validation loop
        while (1) {
            scanf("%d", &choice);
            while (choice < 1 || choice > 3) {
                printf("Invalid input. Please enter a number between 1 and 3, both included.\n");
                scanf("%d", &choice);
            }
            break;
        }

        if (choice == 1 || choice == 2) {
            char input_path[100];
            printf("Please enter the name of the image to process: ");
            scanf("%s", input_path);

            char image_path[100];
            if (choice == 1) {
                sprintf(image_path, "gallery/%s.png", input_path);
            } else {
                sprintf(image_path, "compressed/%s.bin", input_path);
            }

            char output_path[100];
            if (choice == 1) {
                sprintf(output_path, "compressed/%s.bin", input_path);
            } else {
                sprintf(output_path, "decompressed/%s.png", input_path);
            }

            if (choice == 1) {
                compress_image(image_path, output_path);
                printf("The image has been successfully compressed!\n");
            } else {
                decompress_image(image_path, output_path);
                printf("The image has been successfully decompressed!\n");
            }
        }

        else {
        printf("Goodbye!\n");
        exit=false;
        }
    }

    return 0;
}
