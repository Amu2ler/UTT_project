##
 #@file main.py
 #@brief PhotoStudio - Image manipulation program
 #@author MULLER Arthur and HUA John
 #@date 2023/06/03
#




## Imports
''' - - - - - - - - - - - Bibliothèques - - - - - - - - - - - '''
from PIL import Image, ImageOps, ImageFilter, ImageTk
import os
import tkinter as tk
from tkinter import messagebox, filedialog, simpledialog


''' - - - - - - - - - - - Paramèters on the window  - - - - - - - - - - - '''
# Create the main window
window = tk.Tk()
window.title("PhotoStudio")
window.configure(background='#FF0000')

# Size of the window
window.geometry("550x350")

# Set directory for gallery
gallery_path = "gallery"




''' - - - - - - - - - - - Fonctions - - - - - - - - - - - '''
##
 # @fn list_photos()
 # Shows the list of available images
 #
 #@param None
 #
def list_photos():
    photos = os.listdir(gallery_path)
    messagebox.showinfo("List of Photos", "\n".join(photos))

##
 # @fn show_photos()
 # show a selected photo on the screen
 #
 #@param None
 #
def show_photo():
    name_of_photo = simpledialog.askstring("Show Photo", "Enter the name of the photo:")
    if name_of_photo:
        photo_path = os.path.join(gallery_path, name_of_photo)
        image = Image.open(photo_path)
        image.show()

##
 # @fn resize_image()
 # print the dimension of the image and allow the user to resize it. Export the resulting image and display it
 #
 #@param None
 #
def resize_image():
    name_of_photo = simpledialog.askstring("Resize Image", "Enter the name of the photo:")
    if name_of_photo:
        photo_path = os.path.join(gallery_path, name_of_photo)
        image = Image.open(photo_path)
        messagebox.showinfo("Current Dimensions", f"The current dimensions of your image are: {image.size}")
        new_width = simpledialog.askinteger("Resize Image", "Enter the new width:")
        new_height = simpledialog.askinteger("Resize Image", "Enter the new height:")
        image_resized = image.resize((new_width, new_height))
        image_resized.show()
        save_path = os.path.join(gallery_path, "resized_" + name_of_photo)
        image_resized.save(save_path)

##
 # @fn print_image_metadata()
 # use the pillow library to print all the metadata of the image (Image size, mode, device, datetime taken . . . )
 #
 #@param None
 #
def print_image_metadata():
    name_of_photo = simpledialog.askstring("Print Image Metadata", "Enter the name of the photo:")
    if name_of_photo:
        photo_path = os.path.join(gallery_path, name_of_photo)
        image = Image.open(photo_path)
        metadata = f"Image size: {image.size}\nImage mode: {image.mode}"
        exif_data = image._getexif()
        messagebox.showinfo("Image Metadata", metadata)

##
 # @fn apply_filter
 #Allow the user to apply a filter on the image and export the result.
 #
 #@param None
def apply_filter():
    name_of_photo = simpledialog.askstring("Apply Filters", "Enter the name of the photo:")
    if name_of_photo:
        photo_path = os.path.join(gallery_path, name_of_photo)
        image = Image.open(photo_path)
        filter_choices = [ 
            "Blur",
            "Sharpen",
            "Edge Enhance",
            "Smooth",
            "Emboss",
            "Grayscale",
            "Sepia",
            "Negative",
            "Solarize"
        ]
        filter_choice = simpledialog.askinteger("Apply Filters", "Select a filter:\n" + "\n".join([f"{i+1}. {filter_choices[i]}" for i in range(len(filter_choices))]))
        if 1 <= filter_choice <= len(filter_choices):
            filter_name = filter_choices[filter_choice - 1]
            if filter_name == "Blur":
                image_filtered = image.filter(ImageFilter.BLUR)
            elif filter_name == "Sharpen":
                image_filtered = image.filter(ImageFilter.SHARPEN)
            elif filter_name == "Edge Enhance":
                image_filtered = image.filter(ImageFilter.EDGE_ENHANCE)
            elif filter_name == "Smooth":
                image_filtered = image.filter(ImageFilter.SMOOTH)
            elif filter_name == "Emboss":
                image_filtered = image.filter(ImageFilter.EMBOSS)
            elif filter_name == "Grayscale":
                image_filtered = ImageOps.grayscale(image)
            elif filter_name == "Sepia":
                image_filtered = image.convert('L')
                image_filtered = ImageOps.colorize(image_filtered, '#704214', '#C0C090')
            elif filter_name == "Negative":
                image_filtered = ImageOps.invert(image)
            elif filter_name == "Solarize":
                image_filtered = ImageOps.solarize(image, threshold=128)
            image_filtered.show()
            save_path = os.path.join(gallery_path, "filtered_" + name_of_photo)
            image_filtered.save(save_path)
        else:
            messagebox.showerror("Invalid Filter Choice", "Invalid filter choice.")


##
 #@brief Buttons
 #Creates buttons for each action: List Photos, Show Photo, Resize Image, Print Image Metadata, and Apply Filters.
 #Associates each button with its corresponding action function.
 #
''' - - - - - - - - - - - Buttons - - - - - - - - - - - '''
btn_list = tk.Button(window, text="List Photos", command=list_photos)
btn_list.pack(pady=10, anchor="center")

btn_show = tk.Button(window, text="Show Photo", command=show_photo)
btn_show.pack(pady=10, anchor="center")

btn_RI = tk.Button(window, text="Resize Image", command=resize_image)
btn_RI.pack(pady=10, anchor="center")

btn_metadata = tk.Button(window, text="Print Image Metadata", command=print_image_metadata)
btn_metadata.pack(pady=10, anchor="center")

btn_filter = tk.Button(window, text="Apply Filters", command=apply_filter)
btn_filter.pack(pady=10, anchor="center")

##
 #@brief Enters the main loop of the GUI to handle user interaction and events.
 #
window.mainloop()
  
