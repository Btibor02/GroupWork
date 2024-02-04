
class Hairdresser:
    def __init__(self):
        self._haircut_services = {
            "Classic Haircut": 20,
            "Layered Haircut": 25,
            "Pixie Cut": 18,
            "Undercut": 30
        }

        self._beard_services = {
            "Beard Trim": 15,
            "Beard Design and Sculpting": 25,
            "Hot Towel Beard Shave": 30,
            "Beard Coloring and Touch-Up": 20
        }

        self._hair_products = {
            "Hair Styling Gel": 12,
            "Texturizing Spray": 15,
        }

        self._beard_products = {
            "Beard Oil": 15,
            "Beard Balm": 18
        }

    def get_haircut_services(self):
        return self._haircut_services

    def get_beard_services(self):
        return self._beard_services

    def get_hair_products(self):
        return self._hair_products

    def get_beard_products(self):
        return self._beard_products

    def calculate_price(self, options:list):
        pass

