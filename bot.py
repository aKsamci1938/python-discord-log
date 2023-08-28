import discord
import mysql.connector

intents = discord.Intents.all()
intents.members = True 

urlk = "https://www.youtube.com/watch?v=p6UU4LLRqvE"
TOKEN = "" #Get discord bot token.

client = discord.Client(intents=intents)
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="dev"
)


@client.event
async def on_ready():
    print('Logged in as {0.user}'.format(client))
    await client.change_presence(activity=discord.Streaming(name="Ahiret'te", url=urlk))
    


@client.event
async def on_member_join(member):
    user_id = member.id
    user_name = member.name
    user_discriminator = member.discriminator
    user_avatar = author.avatar.url  

    cursor = db.cursor()
    sql = "INSERT INTO discord_logs (user_id, user_name, user_discriminator, user_avatar) VALUES (%s, %s, %s, %s)"
    val = (str(user_id), user_name, user_discriminator, user_avatar)
    cursor.execute(sql, val)
    db.commit()
    cursor.close()

@client.event
async def on_message(message):
    if message.author == client.user:
        return

    user_id = message.author.id
    user_name = message.author.name
    user_discriminator = message.author.discriminator
    user_avatar = message.author.avatar.url  
    message_content = message.content
    message_channel_id = message.channel.id
    message_channel_name = message.channel.name
    message_guild_id = message.guild.id
    message_guild_name = message.guild.name
    message_timestamp = message.created_at  

    cursor = db.cursor()
    sql = "INSERT INTO discord_logs (user_id, user_name, user_discriminator, user_avatar, message_content, message_channel_id, message_channel_name, message_guild_id, message_guild_name, message_timestamp) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    val = (
        str(user_id), user_name, user_discriminator, user_avatar,
        message_content, str(message_channel_id), message_channel_name,
        str(message_guild_id), message_guild_name, message_timestamp
    )
    cursor.execute(sql, val)
    db.commit()
    cursor.close()
    



client.run(TOKEN)
# aksamci Log
# THANKS :D
