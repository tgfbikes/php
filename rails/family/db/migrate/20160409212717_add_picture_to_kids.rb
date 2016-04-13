class AddPictureToKids < ActiveRecord::Migration
  def change
    add_column :kids, :picture, :string
  end
end
