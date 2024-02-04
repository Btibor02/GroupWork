import tkinter
def on_button_click():
    label.config(text="Hello, " + entry.get())

# Create the main window
window = tkinter.Tk()
window.title("Simple GUI")

# Create and place widgets (e.g., button, label, entry)
label = tkinter.Label(window, text="Enter your name:")
label.pack()

entry = tkinter.Entry(window)
entry.pack()

button = tkinter.Button(window, text="Say Hello", command=on_button_click)
button.pack()

# Start the GUI event loop
window.mainloop()
